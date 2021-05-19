<?php

namespace App\Providers;

use App\Infrastructures\Notifications\laravel\RegisterUser\NotificationRegisterUserService;
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
            NotificationRegisterUserService::class
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
