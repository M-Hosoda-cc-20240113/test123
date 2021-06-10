<?php

namespace App\Infrastructures\Notifications\laravel\plugins\slack_notification_channel\RegisterUser;

use App\Mail\RegisterMail;
use App\Services\Notification\RegisterUser\NotificationRegisterUserParameter;
use App\Services\Notification\RegisterUser\NotificationRegisterUserServiceInterface;

/**
 * Class NotificationRegisterUserService
 * @package App\Infrastructures\Notifications\laravel\RegisterUser
 */
class NotificationRegisterUserService implements NotificationRegisterUserServiceInterface
{
    /**
     * {@inheritDoc}
     */
    public function send(NotificationRegisterUserParameter $parameter)
    {
        \Slack::send("【Aegis新規登録】 " . $parameter->getSendUser()->sei . " " . $parameter->getSendUser()->mei . "さんがAegisに登録しました。");
    }
}
