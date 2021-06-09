<?php


namespace App\Services\Notification\ApplyUser;

/**
 * Interface NotificationApplyUserServiceInterface
 * @package App\Services\Notification\ApplyUser
 */
interface NotificationApplyUserServiceInterface
{
    /**
     * @param NotificationApplyUserParameter $parameter
     * @return mixed
     */
    public function send(NotificationApplyUserParameter $parameter);
}
