<?php

namespace App\Http\Controllers\Front\Email;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\SendChangeEmailRequest;
use App\Services\Mail\ChangeEmailService;
use App\Services\Mail\FindEmailReset\FindEmailResetService;
use App\Services\Mail\RequestChange\RequestChangeEmailService;
use Auth;
use Illuminate\Contracts\Foundation\Application as ApplicationAlias;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class EmailController
 * @package App\Http\Controllers\Front\Email
 */
class EmailController extends Controller
{
    /**
     * EmailController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return ApplicationAlias|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showEditForm()
    {
        return view('front.pages.email.change_request');
    }

    /**
     * @param SendChangeEmailRequest $request
     * @param RequestChangeEmailService $request_change_email_service
     * @return ApplicationAlias|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function sendChangeEmail(
        SendChangeEmailRequest $request,
        RequestChangeEmailService $request_change_email_service
    ) {
        $request_change_email_service->exec(Auth::getUser(), $request->email);

        return view('front.pages.email.email_sent');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Services\Mail\FindEmailReset\FindEmailResetService $find_email_reset_service
     * @param \App\Services\Mail\ChangeEmailService $change_email_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Throwable
     */
    public function changeEmail(
        Request $request,
        FindEmailResetService $find_email_reset_service,
        ChangeEmailService $change_email_service
    ) {
        $user = Auth::user();
        if (!$request->token || $user->email_hash !== $request->email_hash) {
            throw new NotFoundHttpException();
        }

        $email_reset = $find_email_reset_service->findByToken($request->token);
        if (!$email_reset || $email_reset->isTokenExpired()) {
            throw new NotFoundHttpException();
        }

        \DB::transaction(function () use ($change_email_service, $user, $email_reset) {
            $change_email_service->exec($user, $email_reset);
        });

        Auth::logout();
        $request->session()->invalidate();

        return view('front.pages.email.change_done');
    }
}
