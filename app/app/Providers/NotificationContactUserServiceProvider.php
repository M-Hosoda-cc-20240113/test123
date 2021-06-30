<?php

namespace App\Providers;

use App\Infrastructures\Notifications\laravel\plugins\slack_notification_channel\ContactUser\NotificationContactUser;
use App\Services\Notification\ContactUser\NotificationContactUserServiceInterface;
use Illuminate\Support\ServiceProvider;

class NotificationContactUserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            NotificationContactUserServiceInterface::class,
            NotificationContactUser::class
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
