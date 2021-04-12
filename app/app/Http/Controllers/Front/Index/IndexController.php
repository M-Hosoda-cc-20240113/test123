<?php

namespace App\Http\Controllers\Front\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Project\ProjectList\ProjectListResponse;
use App\Services\Project\ProjectList\ProjectListService;
use App\Services\Skill\SkillList\SkillListResponse;
use App\Services\Skill\SkillList\SkillListService;
use App\Services\Position\PositionList\PositionListResponse;
use App\Services\Position\PositionList\PositionListService;

class IndexController extends Controller
{
    /**
     * 
     * Front index
     * @var array
     */
    public function index()
     {
        $response = new ProjectListResponse();
        $projects = $project_list_service->exec();
        $response->setProjects($projects);
        return view('front.pages.top.top', ['response' => $response]);
     }
    /**
     * 
     * Front index
     * @var array
     */
    public function show()
    {
        return view('front.welcome');
    }
}
