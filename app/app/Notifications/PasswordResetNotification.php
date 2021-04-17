<?php


namespace App\Notifications;

use App\Models\User;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Notification;

class PasswordResetNotification extends Notification
{
    /**
     * The password reset token.
     * @var string
     */
    public $token;

    /**
     * @var User
     */
    private $user;

    /**
     * PasswordResetNotification constructor.
     * @param string $token
     * @param User $user
     */
    public function __construct(string $token, User $user)
    {
        $this->token = $token;
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new \App\Mail\PasswordResetNotification($this->token, $this->user))->to($this->user->email);
    }

}