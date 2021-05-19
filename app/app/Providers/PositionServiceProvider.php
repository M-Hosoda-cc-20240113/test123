<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Infrastructures\Repositories\Eloquent\PositionRepository;
use App\Services\Project\PositionRepositoryInterface;

class PositionServiceProvider extends ServiceProvider
{
    /**
     * RegisterUser services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\Position\PositionRepositoryInterface::class,
            \App\Infrastructures\Repositories\Eloquent\Position\PositionRepository::class
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
