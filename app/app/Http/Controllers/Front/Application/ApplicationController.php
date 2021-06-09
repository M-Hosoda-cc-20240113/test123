<?php

namespace App\Http\Controllers\Front\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\CreateApplicationRequest;
use App\Services\Application\ApplyProjectService\ApplyProjectParameter;
use App\Services\Application\ApplyProjectService\ApplyProjectService;
use App\Services\Notification\ApplyUser\NotificationApplyUserParameter;
use App\Services\Notification\ApplyUser\NotificationApplyUserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    /**
     * @param CreateApplicationRequest $request
     * @param ApplyProjectService $apply_project_service
     * @param \App\Services\Notification\ApplyUser\NotificationApplyUserServiceInterface $notification_apply_user_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function createApplication(
        CreateApplicationRequest $request,
        ApplyProjectService $apply_project_service,
        NotificationApplyUserServiceInterface $notification_apply_user_service
    ) {
        $user = Auth::user();
        $parameter = new ApplyProjectParameter();
        $parameter->setProjectId($request->project_id);
        $parameter->setUser($user);
        $project = DB::transaction(function () use ($apply_project_service, $parameter) {
            return $apply_project_service->exec($parameter);
        });

        $notification_parameter = new NotificationApplyUserParameter();
        $notification_parameter->setUser($user);
        $notification_parameter->setProjectName($project->name);
        $notification_apply_user_service->send($notification_parameter);

        $project_id = $project->id;
        return redirect()->route('front.project.detail', ['project_id' => $project_id]);
    }
}
