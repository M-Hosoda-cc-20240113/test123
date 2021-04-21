<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Project\CreateProjectRequest;
use App\Services\AdminProject\CreateProject\CreateProjectService;
use App\Services\AdminProject\ProjectList\ProjectListResponse;
use App\Services\AdminProject\ProjectList\ProjectListService;
use App\Services\AdminProject\ProjectDetail\ProjectDetailResponse;
use App\Services\AdminProject\ProjectDetail\ProjectDetailService;
use App\Services\Agent\CreateAgent\CreateAgentService;
use App\Services\Station\CreateStation\CreateStationService;

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
        return view('admin.pages.project.create.create');
    }

    /**
     *
     * Admin project detail
     *
     * @param ProjectDetailService $project_detail_service
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function detail(ProjectDetailService $project_detail_service, int $id)
    {
        $response = new ProjectDetailResponse();

        $project = $project_detail_service->exec($id);

        $response->setProject($project);

        return view('admin.pages.project.detail.detail', ['response' => $response]);
    }

    /**
     * @param \App\Http\Requests\Admin\Project\CreateProjectRequest $request
     * @param \App\Services\AdminProject\CreateProject\CreateProjectService $create_project_service
     */
    public function create(
        CreateProjectRequest $request,
        CreateProjectService $create_project_service): \Illuminate\Http\RedirectResponse
    {
        $project = $create_project_service->exec($request->all());
        $project_id = $project->id;
        return redirect()->route('project.detail', ['project_id' => $project_id]);
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
