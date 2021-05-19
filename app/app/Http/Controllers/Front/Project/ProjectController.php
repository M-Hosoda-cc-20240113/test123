<?php

namespace App\Http\Controllers\Front\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\SearchProjectRequest;
use App\Services\Project\ProjectDetail\ProjectDetailResponse;
use App\Services\Project\ProjectDetail\ProjectDetailService;
use App\Services\Project\SearchProject\SearchProjectParameter;
use App\Services\Project\SearchProject\SearchProjectService;

/**
 * Class ProjectController
 * @package App\Http\Controllers\Front\Project
 */
class ProjectController extends Controller
{

    /**
     * ProjectController constructor.
     */
    public function __construct()
    {
        $this->middleware(['is_not_admin']);
    }

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
     * @param SearchProjectRequest $request
     * @param SearchProjectService $search_project_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search(SearchProjectRequest $request, SearchProjectService $search_project_service)
    {
        $parameter = new SearchProjectParameter();

        if (isset($request->skill_ids)) {
            $parameter->setSkillIds($request->skill_ids);
        }

        if (isset($request->position_ids)) {
            $parameter->setPositionIds($request->position_ids);
        }

        if (isset($request->station_ids)) {
            $parameter->setStationIds($request->station_ids);
        }

        if (isset($request->keyword)) {
            $parameter->setKeyword($request->keyword);
        }

        $response = $search_project_service->search($parameter);

        return view('front.pages.top.top', ['response' => $response]);
    }
}
