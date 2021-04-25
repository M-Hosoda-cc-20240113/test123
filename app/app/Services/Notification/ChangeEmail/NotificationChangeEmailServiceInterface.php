<?php


namespace App\Services\Notification\ChangeEmail;


use App\Models\EmailReset;
use App\Models\User;

/**
 * Interface NotificationChangeEmailServiceInterface
 * @package App\Services\Notification\ChangeEmail
 */
interface NotificationChangeEmailServiceInterface
{
    /**
     * 変更できないユーザーにメール送信
     *
     * @param User $user
     */
    public function sendMailForUnableUser(User $user);

    /**
     * @param User $user
     * @param EmailReset $email_reset
     */
    public function sendMail(User $user, EmailReset $email_reset);
}