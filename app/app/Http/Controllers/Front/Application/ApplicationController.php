<?php

namespace App\Http\Controllers\Front\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\CreateApplicationRequest;
use App\Services\Application\ApplyProjectService\ApplyProjectParameter;
use App\Services\Application\ApplyProjectService\ApplyProjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    /**
     * @param CreateApplicationRequest $request
     * @param ApplyProjectService $apply_project_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function createApplication(CreateApplicationRequest $request, ApplyProjectService $apply_project_service)
    {
        $user = Auth::user();
        $parameter = new ApplyProjectParameter();
        $parameter->setProjectId($request->project_id);
        $parameter->setUser($user);
        DB::transaction(function () use ($apply_project_service, $parameter) {
            $apply_project_service->exec($parameter);
        });
        $project_id = $request->project_id;
        return  redirect()->route('front.project.detail', ['project_id' => $project_id]);
    }
}
