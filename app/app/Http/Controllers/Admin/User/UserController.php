<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateAdminUserRequest;
use App\Services\AdminUser\ShowEditUserForm\ShowEditUserFormService;
use App\Services\AdminUser\UpdateUser\UpdateUserAdminParameter;
use App\Services\AdminUser\UpdateUser\UpdateUserService;
use App\Services\AdminUser\UserList\UserListResponse;
use App\Services\AdminUser\UserList\UserListService;
use App\Services\AdminUser\UserDetail\UserDetailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     *
     * Admin user list
     *
     * @param \App\Services\AdminUser\UserList\UserListService $user_list_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function list(UserListService $user_list_service)
    {
        $response = new UserListResponse();

        $users = $user_list_service->exec();

        $response->setUsers($users);

        return view('admin.pages.user.list.list', ['response' => $response]);
    }

    /**
     *
     * Admin user detail
     *
     * @param \App\Services\AdminUser\UserDetail\UserDetailService $user_detail_service
     * @param int $user_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function detail(UserDetailService $user_detail_service, int $user_id)
    {
        $response = $user_detail_service->exec($user_id);
        return view('admin.pages.user.detail.detail', ['response' => $response]);
    }

    /**
     * @param ShowEditUserFormService $show_edit_user_form_service
     * @param int $user_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showEditForm(ShowEditUserFormService $show_edit_user_form_service, int $user_id)
    {
        $response = $show_edit_user_form_service->exec($user_id);
//        dd($response);
        return view('admin.pages.user.edit.edit', ['response' => $response]);
    }

    /**
     *
     * Admin user edit
     *
     * @param \App\Http\Requests\Admin\User\UpdateAdminUserRequest $request
     * @param \App\Services\AdminUser\UpdateUser\UpdateUserService $update_user_service
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function edit(UpdateAdminUserRequest $request, UpdateUserService $update_user_service)
    {
        $parameter = new UpdateUserAdminParameter();
        $user_id = $request->user_id;
        $parameter->setUserId($user_id);
        $parameter->setStatuses($request->statuses ?? null);
        $parameter->setProjectStatusIds($request->project_status_ids ?? null);
        $parameter->setOperationStartMonth($request->operation_start_month ?? null);
        $parameter->setInterviewDate($request->interview_dates ?? null);
        $parameter->setProjectInterviewIds($request->project_interview_ids ?? null);
        $parameter->setProjectAssignId($request->project_assign_id ?? null);
        $parameter->setAssignmentStartDate($request->assignment_start_date ?? null);
        $parameter->setAssignmentEndDate($request->assignment_end_date ?? null);
        $parameter->setRemarks($request->remarks ?? null);

        $user = DB::transaction(function () use ($update_user_service, $parameter){
            return $update_user_service->exec($parameter);
        });

        return redirect()->route('user.detail', ['user_id' => $user->id]);;
    }

    /**
     *
     * Admin user delete
     * @var array
     */
    public function delete()
    {
        return 'Users delete';
    }
}
