<?php

namespace App\Services\Notification\RegisterUser;

use App\Models\User;

/**
 * Class NotificationRegisterUserParameter
 * @package App\Services\Notification\RegisterUser
 */
class NotificationRegisterUserParameter
{
    /**
     * @var User
     */
    private $send_user;

    /**
     * @return \App\Models\User
     */
    public function getSendUser(): User
    {
        return $this->send_user;
    }

    /**
     * @param \App\Models\User $send_user
     */
    public function setSendUser(User $send_user): void
    {
        $this->send_user = $send_user;
    }
}
