<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Services\AdminUser\ShowEditUserForm\ShowEditUserFormService;
use App\Services\AdminUser\UserList\UserListResponse;
use App\Services\AdminUser\UserList\UserListService;
use App\Services\AdminUser\UserDetail\UserDetailService;
use Illuminate\Http\Request;

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
        return view('admin.pages.user.edit.edit', ['response' => $response]);
    }

    /**
     *
     * Admin user edit
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public function edit(Request $request)
    {
        return 'Users edit';
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
