<?php

namespace App\Http\Controllers\Front\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\CreateApplicationRequest;
use App\Services\Application\ApplyProjectService\ApplyProjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * @param CreateApplicationRequest $request
     * @param ApplyProjectService $apply_project_service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createApplication(CreateApplicationRequest $request, ApplyProjectService $apply_project_service)
    {
        $user = Auth::user();
        $apply_project_service->exec($request->project_id, $user);
        $project_id = $request->project_id;
        return  redirect()->route('front.project.detail', ['project_id' => $project_id]);
    }
}
