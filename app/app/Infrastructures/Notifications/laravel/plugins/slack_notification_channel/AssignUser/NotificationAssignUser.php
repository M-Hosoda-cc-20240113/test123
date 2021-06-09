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
        \Slack::send($parameter->getUserName() . "は" . $parameter->getProjectName() . "にアサインされました。");
    }
}
