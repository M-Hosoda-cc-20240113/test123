<?php


namespace App\Infrastructures\Notifications\laravel\plugins\slack_notification_channel\AssignUser;


use App\Services\Notification\AssignUser\NotificationAssignUserServiceInterface;

class NotificationAssignUser implements NotificationAssignUserServiceInterface
{
    /**
     * {@inheritDoc}
     */
    public function send($parameter)
    {
        \Slack::send("【Aegis稼働通知】".$parameter->getUserName() . "さんは" . $parameter->getProjectName() . "にアサインされました。");
    }
}
