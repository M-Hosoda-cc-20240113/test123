<?php


namespace App\Infrastructures\Notifications\laravel\plugins\slack_notification_channel\ApplyUser;


use App\Services\Notification\ApplyUser\NotificationApplyUserParameter;
use App\Services\Notification\ApplyUser\NotificationApplyUserServiceInterface;

class NotificationApplyUser implements NotificationApplyUserServiceInterface
{
    public function send(NotificationApplyUserParameter $parameter)
    {
        \Slack::send("【Aegis応募通知】".$parameter->getUser()->sei." ".$parameter->getUser()->mei . " さんは" . $parameter->getProjectName() . "に応募しました。");
    }
}
