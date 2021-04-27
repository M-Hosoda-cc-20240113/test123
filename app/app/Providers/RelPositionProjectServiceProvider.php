<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RelPositionProjectServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\RelPositionProject\RelPositionProjectRepositoryInterface::class,
            \App\Infrastructures\Repositories\Eloquent\RelPositionProject\RelPositionProjectRepository::class
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
