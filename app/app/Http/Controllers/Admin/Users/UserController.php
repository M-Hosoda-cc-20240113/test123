<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * 
     * Admin index
     * @var array
     */
    public function list()
    {
        return 'Users list';
    }
}
