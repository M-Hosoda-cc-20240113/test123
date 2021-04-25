<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChangeEmailForUnableUserNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var User
     */
    public $user;

    /**
     * ChangeEmailForUnableUserNotification constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): ChangeEmailForUnableUserNotification
    {
        return $this
            ->from(config('mail.from_noreply.address'), config('mail.from_noreply.name'))
            ->subject('登録メールアドレス変更について(Aegis)')
            ->text('front.emails.email.notification_unable_user');
    }
}
