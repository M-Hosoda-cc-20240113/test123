<?php


namespace App\Infrastructures\Notifications\laravel\plugins\slack_notification_channel\ContactUser;


use App\Services\Notification\ContactUser\NotificationContactUserParameter;
use App\Services\Notification\ContactUser\NotificationContactUserServiceInterface;

class NotificationContactUser implements NotificationContactUserServiceInterface
{
    /**
     * {@inheritDoc}
     */
    public function send(NotificationContactUserParameter $parameter)
    {
        \Slack::send("<!channel>\n!!!!【Aegis緊急通知】!!!!\n1on1で探しまっせ！ボタンが押されました。\n" ."【名前：". $parameter->getSei() . ' ' . $parameter->getMei() . '  (' . $parameter->getSeiKana() . ' ' . $parameter->getMeiKana() . ")】\n"."【電話番号：".$parameter->getTel()."】\n【Email：".$parameter->getEmail()."】");
    }
}
