<?php

namespace App\Mail;

use App\Services\Notification\RegisterUser\NotificationRegisterUserParameter;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class RegisterMail
 * @package App\Mail
 */
class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var NotificationRegisterUserParameter
     */
    public $parameter;

    /**
     * RegisterMail constructor.
     * @param NotificationRegisterUserParameter $parameter
     */
    public function __construct(NotificationRegisterUserParameter $parameter)
    {
        $this->parameter = $parameter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): RegisterMail
    {
        return $this
            ->from(config('mail.from_noreply.address'), config('mail.from_noreply.name'))
            ->subject('登録完了のお知らせ(Aegis)')
            ->text('front.emails.register.registered');
    }
}
