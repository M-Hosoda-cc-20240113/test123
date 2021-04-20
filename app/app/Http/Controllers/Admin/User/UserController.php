<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Services\AdminUser\UserList\UserListResponse;
use App\Services\AdminUser\UserList\UserListService;
use App\Services\AdminUser\UserDetail\UserDetailService;

class UserController extends Controller
{
    /**
     *
     * Admin user list
     * @var array
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
     * @var array
     */
    public function detail(UserDetailService $user_detail_service, int $user_id)
    {
        $response = $user_detail_service->exec($user_id);
        return view('admin.pages.user.detail.detail', ['response' => $response]);
    }

    /**
     *
     * Admin user edit
     * @var array
     */
    public function edit()
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
