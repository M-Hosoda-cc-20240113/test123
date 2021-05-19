<?php

namespace App\Providers;

use App\Infrastructures\Repositories\Eloquent\Level\LevelRepository;
use App\Services\Level\LevelRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class LevelServiceProvider extends ServiceProvider
{
    /**
     * RegisterUser services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
           \App\Services\Level\LevelRepositoryInterface::class,
            \App\Infrastructures\Repositories\Eloquent\Level\LevelRepository::class
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
