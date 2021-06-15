<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class StationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\Station\AreaRepositoryInterface::class,
            \App\Infrastructures\Repositories\Eloquent\Station\AreaRepository::class
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
