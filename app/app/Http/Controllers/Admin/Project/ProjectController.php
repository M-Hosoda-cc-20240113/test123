<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Project\CreateProjectRequest;
use App\Services\AdminProject\CreateProject\CreateProjectService;
use App\Services\AdminProject\ShowCreateProjectForm\ShowCreateProjectFormService;
use App\Services\AdminProject\ProjectList\ProjectListResponse;
use App\Services\AdminProject\ProjectList\ProjectListService;
use App\Services\AdminProject\ProjectDetail\ProjectDetailResponse;
use App\Services\AdminProject\ProjectDetail\ProjectDetailService;

class ProjectController extends Controller
{
    /**
     *
     * Admin project index
     *
     * @param \App\Services\AdminProject\ProjectList\ProjectListService $project_list_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function list(ProjectListService $project_list_service)
    {
        $response = new ProjectListResponse();

        $projects = $project_list_service->exec();

        $response->setProjects($projects);

        return view('admin.pages.project.list.list', ['response' => $response]);
    }

    public function showCreateForm(ShowCreateProjectFormService $create_project_form_service)
    {
        $response = $create_project_form_service->exec();
        return view('admin.pages.project.create.create', ['response' => $response]);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(
        CreateProjectRequest $request,
        CreateProjectService $create_project_service
    ) {
        $project = $create_project_service->exec($request->all());
        $project_id = $project->id;
        return redirect()->route('project.detail', ['project_id' => $project_id]);
    }

    /**
     *
     * Admin project edit
     *
     * @return string
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
