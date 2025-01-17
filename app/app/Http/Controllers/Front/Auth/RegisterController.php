<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\RegisterUserRequest;
use App\Services\AdminUser\TotalUserPoints\TotalUserPointsParameter;
use App\Services\AdminUser\TotalUserPoints\TotalUserPointsService;
use App\Services\Application\ApplyProjectService\ApplyProjectParameter;
use App\Services\Application\ApplyProjectService\ApplyProjectService;
use App\Services\Notification\ApplyUser\NotificationApplyUserParameter;
use App\Services\Notification\ApplyUser\NotificationApplyUserServiceInterface;
use App\Services\Notification\RegisterUser\NotificationRegisterUserParameter;
use App\Services\Notification\RegisterUser\NotificationRegisterUserServiceInterface;
use App\Services\User\RegisterUser\RegisterUserParameter;
use App\Services\User\RegisterUser\RegisterUserService;
use App\Http\Controllers\Traits\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | RegisterUser Controller
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
     * @param \App\Services\User\RegisterUser\RegisterUserService $register_user_service
     * @param \App\Services\Application\ApplyProjectService\ApplyProjectService $apply_project_service
     * @param \App\Services\AdminUser\TotalUserPoints\TotalUserPointsService $total_user_points_service
     * @param \App\Services\Notification\ApplyUser\NotificationApplyUserServiceInterface $notification_apply_user_service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws \Throwable
     */
    public function register(
        RegisterUserRequest $request,
        RegisterUserService $register_user_service,
        ApplyProjectService $apply_project_service,
        TotalUserPointsService $total_user_points_service,
        NotificationApplyUserServiceInterface $notification_apply_user_service
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
        $parameter->setContactTime($request->contact_time);
        if ($request->invite_user_code) {
            $parameter->setInviteUserCode($request->invite_user_code);
        }

        $user = DB::transaction(function () use ($register_user_service, $parameter) {
            return $register_user_service->exec($parameter);
        });

        $notification_parameter = new NotificationRegisterUserParameter();
        $notification_parameter->setSendUser($user);

        $notification = \App::makeWith(NotificationRegisterUserServiceInterface::class, ['type' => 'mail']);
        $notification->send($notification_parameter);
        $notification = \App::makeWith(NotificationRegisterUserServiceInterface::class, ['type' => 'slack']);
        $notification->send($notification_parameter);

        if (!empty($request->project_id)) {
            $parameter = new ApplyProjectParameter();
            $parameter->setProjectId($request->project_id);
            $parameter->setUser($user);
            $project = DB::transaction(function () use ($apply_project_service, $parameter) {
                return $apply_project_service->exec($parameter);
            });
            $notification_apply_parameter = new NotificationApplyUserParameter();
            $notification_apply_parameter->setUser($user);
            $notification_apply_parameter->setProjectName($project->name);
            $notification_apply_user_service->send($notification_apply_parameter);
        }

        $parameter = new TotalUserPointsParameter();
        $user_id = $user->id;
        $parameter->setUserId($user_id);
        DB::transaction(function () use ($total_user_points_service, $parameter) {
            $total_user_points_service->exec($parameter);
        });

        $this->guard()->login($user);
        return redirect($this->redirectTo);
    }
}
