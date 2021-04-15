<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\RegisterUserRequest;
use App\Models\User;
use App\Http\Controllers\Traits\RegistersUsers;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/mypage';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('front.pages.register.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'sei'       => ['required', 'string', 'max:255'],
            'mei'       => ['required', 'string', 'max:255'],
            'sei_kana'  => ['required', 'string', 'max:255'],
            'mei_kana'  => ['required', 'string', 'max:255'],
            'birthday'  => ['required', 'string', 'max:255'],
            'tel'       => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed','alpha_dash'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param \App\Http\Requests\Front\RegisterUserRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register( RegisterUserRequest $request)
    {
        $user = $this->create($request->all());

        $this->guard()->login($user);

        return redirect($this->redirectTo);
    }

    private function create(array $request)
    {
        return User::create([
            'sei'       => $request['sei'],
            'mei'       => $request['mei'],
            'sei_kana'  => $request['sei_kana'],
            'mei_kana'  => $request['mei_kana'],
            'birthday'  => $request['birthday'],
            'tel'       => $request['tel'],
            'email'     => $request['email'],
            'email_hash'=> hash(config('app.hash_email.algo'),$request['email']. config('app.hash_email.salt')),
            'password'  => bcrypt($request['password']),
        ]);
    }
}
