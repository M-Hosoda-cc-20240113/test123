<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Infrastructures\Repositories\Eloquent\Admin\PositionRepository;
use App\Services\Admin\Project\PositionRepositoryInterface;

class PositionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\Admin\Position\PositionRepositoryInterface::class,
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
