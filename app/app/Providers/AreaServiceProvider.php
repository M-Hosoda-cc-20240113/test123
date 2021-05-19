<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AreaServiceProvider extends ServiceProvider
{
    /**
     * RegisterUser services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\Area\AreaRepositoryInterface::class,
            \App\Infrastructures\Repositories\Eloquent\Area\AreaRepository::class
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
