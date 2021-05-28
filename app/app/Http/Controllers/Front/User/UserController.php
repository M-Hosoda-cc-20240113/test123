<?php

namespace App\Http\Controllers\Front\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\DeleteUserRequest;
use App\Http\Requests\Front\UpdateUserRequest;
use App\Http\Requests\Front\UpdateUserSkillRequest;
use App\Services\User\DeleteSkill\DeleteSkillService;
use App\Services\User\DeleteUser\DeleteUserService;
use App\Services\User\EditSkill\UpdateSkillParameter;
use App\Services\User\EditSkill\UpdateSkillService;
use App\Services\User\ShowEditSkillForm\ShowEditSkillFormService;
use App\Services\User\ShowEditUserForm\ShowEditUserFormService;
use App\Services\User\UpdateUser\UpdateUserParameter;
use App\Services\User\UpdateUser\UpdateUserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class UserController
 * @package App\Http\Controllers\Front\User
 */
class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_not_admin')->except(['showEditForm', 'edit']);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showEditForm(ShowEditUserFormService $show_edit_user_form_service)
    {
        $response = $show_edit_user_form_service->exec();
        return view('front.pages.mypage.user.edit', ['response' => $response]);
    }

    /**
     * @param UpdateUserRequest $request
     * @param UpdateUserService $update_user_service
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function edit(UpdateUserRequest $request, UpdateUserService $update_user_service): string
    {
        $parameter = new UpdateUserParameter();
        $parameter->setUser(Auth::user());
        $parameter->setSei($request->sei);
        $parameter->setSeiKana($request->sei_kana);
        $parameter->setMei($request->mei);
        $parameter->setMeiKana($request->mei_kana);
        $parameter->setTel($request->tel);
        $parameter->setBirthday($request->birthday);

        DB::transaction(function () use ($update_user_service, $parameter) {
            $update_user_service->exec($parameter);
        });

        return redirect()->route('home.mypage');
    }

    /**
     * @param \App\Services\User\ShowEditSkillForm\ShowEditSkillFormService $show_edit_skill_form_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showEditSkillForm(ShowEditSkillFormService $show_edit_skill_form_service)
    {
        $response = $show_edit_skill_form_service->exec();
        return view('front.pages.mypage.skill.edit', ['response' => $response]);
    }

    /**
     * @param \App\Http\Requests\Front\UpdateUserSkillRequest $request
     * @param \App\Services\User\EditSkill\UpdateSkillService $update_skill_service
     * @param \App\Services\User\DeleteSkill\DeleteSkillService $delete_skill_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function skillEdit(
        UpdateUserSkillRequest $request,
        UpdateSkillService $update_skill_service,
        DeleteSkillService $delete_skill_service
    ): RedirectResponse {
        $user_id = Auth::id();
        $parameter = new UpdateSkillParameter();
        $parameter->setUserId($user_id);
        $parameter->setSkillids($request->skill_ids ?? []);
        $parameter->setLevelids($request->level_ids ?? []);

        DB::transaction(function () use ($update_skill_service, $delete_skill_service, $user_id, $parameter) {
            $delete_skill_service->deleteByUserId($user_id);
            $update_skill_service->exec($parameter);
        });

        return redirect()->route('home.mypage');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showDeleteForm()
    {
        return view('front.pages.mypage.delete.showDeleteForm');
    }

    /**
     * @param \App\Services\User\DeleteUser\DeleteUserService $delete_user_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function delete(DeleteUserService $delete_user_service)
    {
        $user_id = Auth::id();
        DB::transaction(function () use ($delete_user_service, $user_id) {
            $delete_user_service->exec($user_id);
        });
        return redirect()->route('front.index');
    }
}
