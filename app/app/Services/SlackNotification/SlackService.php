<?php


namespace App\Services\SlackNotification;

use Illuminate\Notifications\Notifiable;
use App\Notifications\SlackNotification;

class SlackService
{
    use Notifiable;

    /**
     * @param null $message
     */
    public function send($message = null)
    {
        $this->notify(new SlackNotification($message));
    }

    /**
     * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    protected function routeNotificationForSlack()
    {
        return config('app.slack.url');
    }
}
