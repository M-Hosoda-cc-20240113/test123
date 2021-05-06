<?php

namespace App\Http\Controllers\Admin\Assignment;

use App\Http\Requests\Admin\Assignment\RegisterAssignmentRequest;
use App\Services\Assignment\AssignmentList\AssignmentListResponse;
use App\Services\Assignment\AssignmentList\AssignmentListService;
use App\Services\Assignment\DeleteAssignment\DeleteAssignmentParameter;
use App\Services\Assignment\DeleteAssignment\DeleteAssignmentService;
use App\Services\Assignment\RegisterAssignment\RegisterAssignmentParameter;
use App\Services\Assignment\RegisterAssignment\RegisterAssignmentService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignmentController extends Controller
{
    /**
     * Admin application status
     * @param AssignmentListService $assignment_list_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function list(AssignmentListService $assignment_list_service)
    {
        $response = new AssignmentListResponse();

        $assignments = $assignment_list_service->exec();

        $response->setAssignments($assignments);

        return view('admin.pages.assignment.list.list', ['response' => $response]);
    }

    /**
     * @param RegisterAssignmentRequest $request
     * @param RegisterAssignmentService $register_assignment_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function register(RegisterAssignmentRequest $request, RegisterAssignmentService $register_assignment_service)
    {
        $parameter = new RegisterAssignmentParameter();
        $parameter->setUserId($request->user_id);
        $parameter->setProjectId($request->project_id);

        $user_project = DB::transaction(function () use ($register_assignment_service, $parameter) {
            return $register_assignment_service->exec($parameter);
        });
//        \Slack::send($user_project['user_name'] . "は" . $user_project['project_name'] . "にアサインしました。");
        return redirect()->route('application.list');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Services\Assignment\DeleteAssignment\DeleteAssignmentService $delete_assignment_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function delete(Request $request, DeleteAssignmentService $delete_assignment_service)
    {
        $parameter = new DeleteAssignmentParameter();
        $parameter->setUserId($request->user_id);
        $parameter->setProjectId($request->project_id);
        DB::transaction(function () use ($delete_assignment_service, $parameter) {
            return $delete_assignment_service->exec($parameter);
        });

        return redirect()->route('assignment.list');
    }
}
