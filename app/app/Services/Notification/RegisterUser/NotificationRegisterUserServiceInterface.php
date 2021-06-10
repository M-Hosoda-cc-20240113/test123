<?php

namespace App\Services\Notification\RegisterUser;

/**
 * Interface NotificationRegisterUserServiceInterface
 * @package App\Services\Notification\RegisterUser
 */
interface NotificationRegisterUserServiceInterface
{
    /**
     * @param NotificationRegisterUserParameter $parameter
     * @return mixed
     */
    public function send(NotificationRegisterUserParameter $parameter);
}
