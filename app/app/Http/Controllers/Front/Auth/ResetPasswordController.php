<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ResetsPasswords;
use App\Http\Requests\Admin\Station\Admin\Agent\Front\ResetPasswordRequest;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Password;

/**
 * Class ResetPasswordController
 * @package App\Http\Controllers\Front\Auth
 */
class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * ResetPasswordController constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param Request $request
     * @param string|null $token
     * @return Application|Factory|View
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('front.pages.password.reset')->with(
            ['token' => $token, 'token2' => $request->email_hash]
        );
    }

    /**
     * @param ResetPasswordRequest $request
     * @return Application|Factory|View|JsonResponse|RedirectResponse
     */
    public function reset(ResetPasswordRequest $request)
    {
        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        if ($response == Password::PASSWORD_RESET) {
            Auth::logout();
            $request->session()->invalidate();
            return view('front.pages.password.reset_complete');
        }
        return $this->sendResetFailedResponse($request, $response);
    }

    /**
     * Get the password reset credentials from the request.
     *
     * @param Request $request
     * @return array
     */
    protected function credentials(Request $request): array
    {
        return [
            'email_hash' => $request->token2,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
            'token' => $request->token
        ];
    }
}
