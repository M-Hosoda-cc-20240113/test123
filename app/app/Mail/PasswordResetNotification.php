<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordResetNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * @var User
     */
    private $user;

    /**
     * Create a notification instance.
     *
     * @param string $token
     * @param User $user
     */
    public function __construct(
        string $token,
        User $user
    ) {
        $this->token = $token;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('パスワード再設定のご案内(Aegis)')
            ->text(
                'front.emails.password.notification',
                [
                    'reset_url' => route('password.reset', ['token' => $this->token, 'email_hash' => $this->user->email_hash]),
                    'sei' => $this->user->sei
                ]
            );
    }
}
