<?php

namespace App\Providers;

use App\Infrastructures\Notifications\laravel\plugins\slack_notification_channel\RegisterUser\NotificationRegisterUserService as NotificationRegisterUserBySlack;
use App\Infrastructures\Notifications\laravel\RegisterUser\NotificationRegisterUserService as NotificationRegisterUserByMail;
use App\Services\Notification\RegisterUser\NotificationRegisterUserServiceInterface;
use Illuminate\Support\ServiceProvider;

class NotificationRegisterUserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            NotificationRegisterUserServiceInterface::class,
            function ($app, $notification) {
                switch ($notification['type']){
                    case 'mail':
                        return $app->make(NotificationRegisterUserByMail::class);
                        break;

                    case 'slack':
                        return $app->make(NotificationRegisterUserBySlack::class);
                        break;

                    default:
                        return $app->make(NotificationRegisterUserByMail::class);
                }
            }
        );
    }


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
