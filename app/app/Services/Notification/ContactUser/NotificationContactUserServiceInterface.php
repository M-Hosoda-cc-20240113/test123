<?php


namespace App\Services\Notification\ContactUser;


use App\Services\Notification\ContactUser\NotificationContactUserParameter;

interface NotificationContactUserServiceInterface
{
    /**
     * @param NotificationContactUserParameter $parameter
     * @return mixed
     */
    public function send(NotificationContactUserParameter $parameter);
}
