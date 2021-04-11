<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Services\User\UserList\UserListResponse;
use App\Services\User\UserList\UserListService;

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
     * Admin user show
     * @var array
     */
    public function show()
    {
        return 'Users show';
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
