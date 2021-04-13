<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\AuthenticatesUsers;
use App\Infrastructures\Repositories\Eloquent\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('front.pages.login.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param Request $request
     * @return RedirectResponse|Response|JsonResponse
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function credentials(Request $request)
    {
        return [
            'email_hash' => UserRepository::makeEmailHash($request->email),
            'password' => $request->password
        ];
    }

    public function authenticated(Request $request, $user)
    {
        if ($user->is_admin){
           return redirect()->route('admin.index');
        }

        // 認証フィルターにかかる前にアクセスしようとしていたURLへ、ユーザーをリダイレクトしてくれる。
        return redirect()->intended();
    }

    public function loggedOut(Request $request)
    {
        return redirect()->route('login');
    }
}
