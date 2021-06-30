<?php

namespace App\Providers;

use App\Infrastructures\Repositories\Eloquent\PointsHistory\PointsHistoryRepository;
use App\Services\PointsHistory\PointsHistoryInterface;
use Illuminate\Support\ServiceProvider;

class PointsHistoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
        PointsHistoryInterface::class,
        PointsHistoryRepository::class
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
