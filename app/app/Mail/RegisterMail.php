<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $name;
    protected $data;

    public function __construct($name,$data)
    {
        $this->name = $name;
        $this->data = data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): RegisterMail
    {
        return $this->from('sns@care-con.co.jp')   // 送信先アドレス
        ->subject('登録完了しました。')                 // 件名
        ->view('registers.register_mail')              // 本文
        ->with(['name' => $this->name]);
    }
}
