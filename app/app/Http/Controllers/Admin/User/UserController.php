<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Services\User\UserList\UserListResponse;
use App\Services\User\UserList\UserListService;
use App\Services\User\UserDetail\UserDetailResponse;
use App\Services\User\UserDetail\UserDetailService;

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
    public function detail(UserDetailService $user_detail_service, int $id)
    {
        $response = new UserDetailResponse();

        $user = $user_detail_service->exec($id);

        $response->setUser($user);

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
