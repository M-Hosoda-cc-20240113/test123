<?php

namespace App\Http\Controllers\Front\Project;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Services\Application\CreateApplication\CreateApplicationService;
use App\Services\Project\ProjectDetail\ProjectDetailResponse;
use App\Services\Project\ProjectDetail\ProjectDetailService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{

    /**
     * @var string
     */
    protected $redirectToLogin = '/login';

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

        return view('front.pages.project.detail.detail', ['response' => $response]);
    }

    /**
     * @param int $id
     * @param \App\Services\Application\CreateApplication\CreateApplicationService $create_application_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create_application(int $id, CreateApplicationService $create_application_service)
    {
        $user = Auth::user();
        $create_application_service->exec($id, $user);
        return  redirect('/');
    }
}
