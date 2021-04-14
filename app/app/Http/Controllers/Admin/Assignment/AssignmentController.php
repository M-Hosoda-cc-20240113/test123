<?php

namespace App\Http\Controllers\Admin\Assignment;

use App\Services\Assignment\AssignmentList\AssignmentListResponse;
use App\Services\Assignment\AssignmentList\AssignmentListService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     *
     * Admin application status
     * @var array
     */
     public function list(AssignmentListService $assignment_list_service)
     {
         $response = new AssignmentListResponse();

         $assignments = $assignment_list_service->exec();

         $response->setAssignment($assignments);
//         dd($response->getAssignment());
         return view('admin.pages.assignment.list.list', ['response' => $response]);
     }
}
