<?php

namespace App\Http\Controllers\Front\Project;

use App\Http\Controllers\Controller;
use App\Services\Application\ApplyProjectService\ApplyProjectService;
use App\Services\Application\ProjectApplication\ProjectApplicationService;
use App\Services\Project\ProjectDetail\ProjectDetailResponse;
use App\Services\Project\ProjectDetail\ProjectDetailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

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
    public function detail(ProjectDetailService $project_detail_service, int $project_id)
    {
        $response = new ProjectDetailResponse();

        $project = $project_detail_service->exec($project_id);

        $response->setProject($project);
//        dd($response);
        return view('front.pages.project.detail.detail', ['response' => $response]);
    }

    /**
     * @param int $project_id
     * @param \Illuminate\Http\Request $request
     * @param \App\Services\Application\ApplyProjectService\ApplyProjectService $apply_project_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create_application(int $project_id, Request $request, ApplyProjectService $apply_project_service)
    {
        if(empty($request->assign_user_id) && empty($request->app_user_id)){
            $user = Auth::user();
            $apply_project_service->exec($project_id, $user);
            return  redirect('/');
        }
        return back();
    }
}
