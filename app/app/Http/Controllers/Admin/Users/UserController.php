<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * 
     * Admin user list
     * @var array
     */
    public function list()
    {
        return view('admin.pages.user.list');
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
