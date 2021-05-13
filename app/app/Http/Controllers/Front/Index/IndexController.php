<?php

namespace App\Http\Controllers\Front\Index;

use App\Http\Controllers\Controller;
use App\Services\Project\FetchCanApply\FetchCanApplyService;
use App\Services\AdminProject\ProjectList\ProjectListResponse;
use App\Services\Top\FetchTopData\FetchTopService;

class IndexController extends Controller
{
    /**
     * IndexController constructor.
     */
    public function __construct()
    {
        $this->middleware('is_not_admin');
    }

    /**
     *
     * Front index
     *
     * @param \App\Services\Top\FetchTopData\FetchTopService $fetch_top_data_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(FetchTopService $fetch_top_data_service, FetchCanApplyService $fetch_can_apply_service)
    {
        $project_response = new ProjectListResponse();
        $response = $fetch_top_data_service->exec();
        $project = $fetch_can_apply_service->exec();
        $project_response->setProjects($project);
        return view('front.pages.top.top', ['response' => $response, 'project_response' => $project_response]);
     }
}
