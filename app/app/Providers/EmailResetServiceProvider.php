<?php

namespace App\Providers;

use App\Infrastructures\Notifications\laravel\ChangeEmail\NotificationChangeEmail;
use App\Infrastructures\Repositories\Eloquent\EmailReset\EmailResetRepository;
use App\Services\Mail\ChangeEmailService;
use App\Services\Mail\EmailResetRepositoryInterface;
use App\Services\Notification\ChangeEmail\NotificationChangeEmailServiceInterface;
use Illuminate\Support\ServiceProvider;

class EmailResetServiceProvider extends ServiceProvider
{
    /**
     * RegisterUser services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            EmailResetRepositoryInterface::class,
            EmailResetRepository::class
        );
        $this->app->bind(
            NotificationChangeEmailServiceInterface::class,
            NotificationChangeEmail::class
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
