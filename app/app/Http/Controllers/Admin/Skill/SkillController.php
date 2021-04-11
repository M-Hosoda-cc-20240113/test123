<?php

namespace App\Http\Controllers\Admin\Skill;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Skill\SkillList\SkillListResponse;
use App\Services\Skill\SkillList\SkillListService;

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
     * 
     * Admin skill edit
     * @var array
     */
    public function edit()
    {
        return 'Skills edit';
    }
}
