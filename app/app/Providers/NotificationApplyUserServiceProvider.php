<?php

namespace App\Providers;

use App\Infrastructures\Notifications\laravel\plugins\slack_notification_channel\ApplyUser\NotificationApplyUser;
use App\Services\Notification\ApplyUser\NotificationApplyUserServiceInterface;
use Illuminate\Support\ServiceProvider;

class NotificationApplyUserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            NotificationApplyUserServiceInterface::class,
            NotificationApplyUser::class
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
