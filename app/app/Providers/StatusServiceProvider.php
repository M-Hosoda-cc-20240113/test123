<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class StatusServiceProvider extends ServiceProvider
{
    /**
     * RegisterUser services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\Status\StatusRepositoryInterface::class,
            \App\Infrastructures\Repositories\Eloquent\Status\StatusRepository::class
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
