<?php

namespace App\Providers;

use App\Infrastructures\Repositories\Eloquent\User\UserRepository;
use App\Services\Admin\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\Admin\User\UserRepositoryInterface::class,
            \App\Infrastructures\Repositories\Eloquent\User\UserRepository::class
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
