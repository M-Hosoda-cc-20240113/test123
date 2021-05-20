<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\AuthenticatesUsers;
use App\Infrastructures\Repositories\Eloquent\User\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
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

    // ログイン試行回数（回）
    protected $maxAttempts = 10;

    // ログインロック時間（分）
    protected $decayMinutes = 5;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showLoginForm()
    {
        return view('front.pages.login.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param Request $request
     * @return RedirectResponse|Response|JsonResponse
     * @throws \Illuminate\Validation\ValidationException
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

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();

        return  redirect('/login');
    }

    /**
     * @param Request $request
     * @return array
     */
    public function credentials(Request $request): array
    {
        return [
            'email_hash' => UserRepository::makeEmailHash($request->email),
            'password' => $request->password
        ];
    }

    /**
     * @param Request $request
     * @param $user
     * @return RedirectResponse
     */
    public function authenticated(Request $request, $user): RedirectResponse
    {
        if ($user->is_admin) {
            return redirect()->route('admin.index');
        }

        return redirect()->route('home.mypage');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loggedOut(Request $request)
    {
        return redirect()->route('login');
    }

    /**
     * @return string
     */
    public function getRecallerName(): string
    {
        return 'remember_'.$this->name.'_'.sha1(static::class);
    }
}
