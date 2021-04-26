<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChangeEmailNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $email_reset;

    /**
     * ChangeEmailNotification constructor.
     * @param $user
     * @param $email_reset
     */
    public function __construct($user, $email_reset)
    {
        $this->user = $user;
        $this->email_reset = $email_reset;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(config('mail.from_noreply.address'), config('mail.from_noreply.name'))
            ->subject('登録メールアドレス変更のご確認(Aegis)')
            ->text('front.emails.email.notification');
    }
}
