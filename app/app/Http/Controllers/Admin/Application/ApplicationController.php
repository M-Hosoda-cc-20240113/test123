<?php

namespace App\Http\Controllers\Admin\Application;

use App\Services\Application\ApplicationList\ApplicationListResponse;
use App\Services\Application\ApplicationList\ApplicationListService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     *
     * Admin application status
     *
     * @param \App\Services\Application\ApplicationList\ApplicationListService $application_list_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function list(ApplicationListService $application_list_service)
    {
        $response = new ApplicationListResponse();

        $applications = $application_list_service->exec();

        $response->setApplications($applications);

        return view('admin.pages.application.list.list', ['response' => $response]);
    }
}
