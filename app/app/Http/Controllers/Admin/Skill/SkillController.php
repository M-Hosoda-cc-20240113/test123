<?php

namespace App\Http\Controllers\Admin\Skill;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Skill\CreateSkillRequest;
use App\Http\Requests\Admin\Skill\DeleteSkillRequest;
use App\Services\Position\DeletePosition\DeletePositionParameter;
use App\Services\Position\DeletePosition\DeletePositionService;
use App\Services\Skill\CreateSkill\CreateSkillParameter;
use App\Services\Skill\CreateSkill\CreateSkillService;
use App\Services\Skill\DeleteSkill\DeleteSkillParameter;
use App\Services\Skill\DeleteSkill\DeleteSkillService;
use Illuminate\Http\Request;
use App\Services\Skill\SkillList\SkillListResponse;
use App\Services\Skill\SkillList\SkillListService;
use Illuminate\Support\Facades\DB;

class SkillController extends Controller
{
    /**
     *
     * Admin skill list
     * @var array
     */
    public function list(SkillListService $skill_list_service)
    {
        $response = new SkillListResponse();

        $skills = $skill_list_service->exec();

        $response->setSkills($skills);

        return view('admin.pages.skill.list.list', ['response' => $response]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function createForm()
    {
        return view('admin.pages.skill.create.create');
    }

    /**
     * @param CreateSkillRequest $request
     * @param CreateSkillService $create_skill_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function create(CreateSkillRequest $request, CreateSkillService $create_skill_service)
    {
        $parameter = new CreateSkillParameter();
        $parameter->setName($request->name);

        DB::transaction(function () use ($create_skill_service, $parameter) {
            $create_skill_service->exec($parameter);
        });
        return redirect()->route('skill.list');
    }


    /**
     * @param DeleteSkillRequest $request
     * @param DeleteSkillService $delete_skill_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function delete(DeleteSkillRequest $request, DeleteSkillService $delete_skill_service)
    {
        $parameter = new DeleteSkillParameter();
        $parameter->setSkillId($request->skill_id);

        DB::transaction(function () use ($delete_skill_service, $parameter) {
            $delete_skill_service->exec($parameter);
        });

        return redirect()->route('skill.list');
    }
}
