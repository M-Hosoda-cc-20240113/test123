<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ApplicationServiceProvider extends ServiceProvider
{
    /**
     * RegisterUser services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\Application\ApplicationRepositoryInterface::class,
            \App\Infrastructures\Repositories\Eloquent\Application\ApplicationRepository::class
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
