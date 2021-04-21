<?php

namespace App\Http\Controllers\Front\User;

use App\Http\Controllers\Controller;
use App\Services\User\ShowEditUserForm\ShowEditUserFormService;
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
    public function showEditForm(ShowEditUserFormService  $show_edit_user_form_service)
    {
        $response = $show_edit_user_form_service->exec();
        return view('front.pages.mypage.user.edit', ['response' => $response]);
    }

    /**
     * @return string
     */
    public function edit()
    {
        return 'hoge';
    }
}
