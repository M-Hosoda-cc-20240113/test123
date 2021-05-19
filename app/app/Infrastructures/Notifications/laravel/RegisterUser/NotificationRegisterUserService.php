<?php

namespace App\Infrastructures\Notifications\laravel\RegisterUser;

use App\Mail\RegisterMail;
use App\Services\Notification\RegisterUser\NotificationRegisterUserParameter;
use App\Services\Notification\RegisterUser\NotificationRegisterUserServiceInterface;

/**
 * Class NotificationRegisterUserService
 * @package App\Infrastructures\Notifications\laravel\RegisterUser
 */
class NotificationRegisterUserService implements NotificationRegisterUserServiceInterface
{

    public function send(NotificationRegisterUserParameter $parameter)
    {
        \Mail::to($parameter->getSendUser()->email)->send(new RegisterMail($parameter));
    }
}
