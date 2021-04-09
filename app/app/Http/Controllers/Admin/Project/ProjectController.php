<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\Project\ProjectList\ProjectListResponse;
use App\Services\Admin\Project\ProjectList\ProjectListService;


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
    public function show()
    {
        return 'Projects show';
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
