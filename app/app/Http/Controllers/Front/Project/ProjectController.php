<?php

namespace App\Http\Controllers\Front\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\CreateApplicationRequest;
use App\Services\Application\ApplyProjectService\ApplyProjectService;
use App\Services\Application\ProjectApplication\ProjectApplicationService;
use App\Services\Project\ProjectDetail\ProjectDetailResponse;
use App\Services\Project\ProjectDetail\ProjectDetailService;
use App\Services\Project\SearchProject\SearchProjectParameter;
use App\Services\Project\SearchProject\SearchProjectService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class ProjectController
 * @package App\Http\Controllers\Front\Project
 */
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
     * @param int $project_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function detail(ProjectDetailService $project_detail_service, int $project_id)
    {
        $response = new ProjectDetailResponse();

        $project = $project_detail_service->exec($project_id);

        $response->setProject($project);

        return view('front.pages.project.detail.detail', ['response' => $response]);
    }

    /**
     * @param \App\Http\Requests\Front\CreateApplicationRequest $request
     * @param \App\Services\Application\ApplyProjectService\ApplyProjectService $apply_project_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createApplication(CreateApplicationRequest $request, ApplyProjectService $apply_project_service)
    {
        $user = Auth::user();
        $apply_project_service->exec($request->project_id, $user);
        return  redirect('/');
    }

    /**
     * @param Request $request
     * @param SearchProjectService $search_project_service
     * @return JsonResponse
     */
    public function search(Request $request, SearchProjectService $search_project_service): JsonResponse
    {
        $parameter = new SearchProjectParameter();

        if (isset($request->hits)) {
            $parameter->setHits($request->hits);
        }

        if (isset($request->page)) {
            $parameter->setPage($request->page);
        }

        if (isset($request->skill_ids)) {
            $parameter->setSkillIds($request->skill_ids);
        }

        if (isset($request->keyword)) {
            $parameter->setKeyword($request->keyword);
        }

        $res = $search_project_service->search($parameter)->toArray();
        return response()->json($res)->header('Content-Type', 'application/json; charset=utf8');
    }
}
