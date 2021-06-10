<?php
namespace App\Services\Notification\AssignUser;

interface NotificationAssignUserServiceInterface
{
    /**
     * @param NotificationAssignUserParameter $parameter
     * @return mixed
     */
    public function send(NotificationAssignUserParameter $parameter);
}
