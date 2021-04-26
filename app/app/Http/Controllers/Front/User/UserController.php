<?php

namespace App\Http\Controllers\Front\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\UpdateUserRequest;
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
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showEditForm(ShowEditUserFormService  $show_edit_user_form_service)
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

        $update_user_service->exec($parameter);

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
     * @param \Illuminate\Http\Request $request
     * @param \App\Services\User\EditSkill\UpdateSkillService $update_skill_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function skillEdit(Request $request, UpdateSkillService $update_skill_service)
    {
        dd($request);
        $parameter = new UpdateSkillParameter();
        $parameter->setUser(Auth::user());
        $parameter->setSkills($request->skill_ids ?? '');
        $parameter->setLevels($request->level_ids ?? '');

        DB::transaction(function () use ($update_skill_service, $parameter) {

            return $update_skill_service->exec($parameter);
        });

        return redirect()->route('home.mypage');
    }
}
