<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\RegisterUserRequest;
use App\Mail\RegisterMail;
use App\Services\Application\ApplyProjectService\ApplyProjectService;
use App\Services\User\RegisterUser\RegisterUserParameter;
use App\Services\User\RegisterUser\RegisterUserService;
use App\Http\Controllers\Traits\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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

    public function showRegistrationForm(Request $request)
    {
        return view('front.pages.register.register', ['project_id' => $request->project_id]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'sei' => ['required', 'string', 'max:255'],
            'mei' => ['required', 'string', 'max:255'],
            'sei_kana' => ['required', 'string', 'max:255'],
            'mei_kana' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'alpha_dash'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param \App\Http\Requests\Front\RegisterUserRequest $request
     * @param \App\Services\Application\ApplyProjectService\ApplyProjectService $apply_project_service
     * @param \App\Services\User\RegisterUser\RegisterUserService $register_user_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function register(
        RegisterUserRequest $request,
        RegisterUserService $register_user_service,
        ApplyProjectService $apply_project_service
    ) {
        $parameter = new RegisterUserParameter();
        $parameter->setSei($request->sei);
        $parameter->setMei($request->mei);
        $parameter->setSeiKana($request->sei_kana);
        $parameter->setMeiKana($request->mei_kana);
        $parameter->setBirthday($request->birthday);
        $parameter->setTel($request->tel);
        $parameter->setEmail($request->email);
        $parameter->setPassword($request->password);

        $user = DB::transaction(function () use ($register_user_service, $parameter) {
            return $register_user_service->exec($parameter);
        });

        if (!empty($request->project_id)) {
            $apply_project_service->exec($request->project_id, $user);
        }
        Mail::to($request['email'])->send(new RegisterMail($request));
        $this->guard()->login($user);
        return redirect($this->redirectTo);
    }
}
