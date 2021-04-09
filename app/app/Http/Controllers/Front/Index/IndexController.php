<?php

namespace App\Http\Controllers\Front\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Front\Project\ProjectCard\ProjectCardResponse;
use App\Services\Front\Project\ProjectCard\ProjectCardService;

use App\Services\Admin\Project\ProjectList\ProjectListResponse;
use App\Services\Admin\Project\ProjectList\ProjectListService;

class IndexController extends Controller
{
    /**
     * 
     * Front index
     * @var array
     */
    public function index(ProjectListService $project_list_service)
     {
        $response = new ProjectListResponse();

        $projects = $project_list_service->exec();

        $response->setProjects($projects);
        // foreach($response->getProjects() as $project)
        // {
        //     dd($project->agents->name);
        // }
        return view('admin.pages.project.list.list', ['response' => $response]);
        //  return view('front.welcome');
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
