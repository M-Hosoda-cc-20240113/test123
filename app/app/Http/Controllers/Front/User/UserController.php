<?php

namespace App\Http\Controllers\Front\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers\Front\User
 */
class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showEditForm()
    {
        return view('front.pages.mypage.user.edit');
    }

    /**
     * @return string
     */
    public function edit()
    {
        return 'hoge';
    }
}
