<?php

namespace App\Http\Controllers\Admin\Application;

use App\Services\Application\ApplicationList\ApplicationListResponse;
use App\Services\Application\ApplicationList\ApplicationListService;
use App\Http\Controllers\Controller;
use App\Services\Application\DeleteApplication\DeleteApplicationParameter;
use App\Services\Application\DeleteApplication\DeleteApplicationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ApplicationController
 * @package App\Http\Controllers\Admin\Application
 */
class ApplicationController extends Controller
{
    /**
     *
     * Admin application status
     *
     * @param ApplicationListService $application_list_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function list(ApplicationListService $application_list_service)
    {
        $response = new ApplicationListResponse();

        $applications = $application_list_service->exec();

        $response->setApplications($applications);

        return view('admin.pages.application.list.list', ['response' => $response]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param DeleteApplicationService $delete_application_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function delete(Request $request, DeleteApplicationService $delete_application_service)
    {
        $parameter = new DeleteApplicationParameter();
        $parameter->setUserId($request->user_id);
        $parameter->setProjectId($request->project_id);

        DB::transaction(function () use ($delete_application_service, $parameter) {
            $delete_application_service->exec($parameter);
        });

        return redirect()->route('application.list');
    }
}
