<?php

namespace App\Providers;

use App\Infrastructures\Notifications\laravel\plugins\slack_notification_channel\AssignUser\NotificationAssignUser;
use App\Services\Notification\AssignUser\NotificationAssignUserServiceInterface;
use Illuminate\Support\ServiceProvider;

class NotificationAssignUserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            NotificationAssignUserServiceInterface::class,
            NotificationAssignUser::class
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
