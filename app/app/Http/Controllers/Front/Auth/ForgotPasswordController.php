<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\SendPasswordResetEmails;
use App\Http\Requests\Front\sendChangePasswordRequest;
use App\Infrastructures\Repositories\Eloquent\User\UserRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ForgotPasswordController extends Controller
{
    use SendPasswordResetEmails;

    /**
     * ForgotPasswordController constructor.
     */
    public function __construct()
    {
        $this->middleware('throttle')->only('sendResetLinkEmail');
    }


    /**
     * Display the form to request a password reset link.
     *
     * @return Application|Factory|View
     */
    public function showLinkRequestForm()
    {
        return view('front.pages.password.change_request');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param sendChangePasswordRequest $request
     * @return Application|Factory|View
     */
    public function sendResetLinkEmail(sendChangePasswordRequest $request)
    {
        $this->broker()->sendResetLink(
            ['email_hash' => UserRepository::makeEmailHash($request->email)]
        );

        return view('front.pages.password.email_sent');
    }
}
