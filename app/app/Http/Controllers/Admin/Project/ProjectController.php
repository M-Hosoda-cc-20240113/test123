<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Services\Project\ProjectList\ProjectListResponse;
use App\Services\Project\ProjectList\ProjectListService;
use App\Services\Project\ProjectDetail\ProjectDetailResponse;
use App\Services\Project\ProjectDetail\ProjectDetailService;

class ProjectController extends Controller
{
    /**
     * 
     * Admin project index
     * @var array
     */
    public function list(ProjectListService $project_list_service)
    {
        $response = new ProjectListResponse();

        $projects = $project_list_service->exec();

        $response->setProjects($projects);

        return view('admin.pages.project.list.list', ['response' => $response]);
    }

    public function showCreateForm()
    {
        return view('admin.pages.project.detail.detail');
    }

    /**
     * 
     * Admin project show
     * @var array
     */
    public function detail(ProjectDetailService $project_detail_service, int $id)
    {
        $response = new ProjectDetailResponse();

        $project = $project_detail_service->exec($id);

        $response->setProject($project);
        // dd($response);
        return view('admin.pages.project.detail.detail', ['response' => $response]);
    }

    /**
     * 
     * Admin project edit
     * @var array
     */
    public function edit()
    {
        return 'Projects edit';
    }

    /**
     * 
     * Admin project delete
     * @var array
     */
    public function delete()
    {
        return 'Projects delete';
    }
}
