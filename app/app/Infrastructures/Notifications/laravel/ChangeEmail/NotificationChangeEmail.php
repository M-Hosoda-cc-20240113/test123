<?php


namespace App\Infrastructures\Notifications\laravel\ChangeEmail;


use App\Mail\ChangeEmailForUnableUserNotification;
use App\Mail\ChangeEmailNotification;
use App\Models\EmailReset;
use App\Models\User;
use App\Services\Notification\ChangeEmail\NotificationChangeEmailServiceInterface;

/**
 * Class NotificationChangeEmail
 * @package App\Infrastructures\Notifications\laravel\ChangeEmail
 */
class NotificationChangeEmail implements NotificationChangeEmailServiceInterface
{
    /**
     * {@inheritDoc}
     */
    public function sendMailForUnableUser(User $user)
    {
        \Mail::to($user->email)->send(new ChangeEmailForUnableUserNotification($user));
    }

    /**
     * {@inheritDoc}
     */
    public function sendMail(User $user, EmailReset $email_reset)
    {
       \Mail::to($user->email)->send(new ChangeEmailNotification($user, $email_reset));
    }

}