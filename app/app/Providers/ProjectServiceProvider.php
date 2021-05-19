<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class ProjectServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\Project\ProjectRepositoryInterface::class,
            \App\Infrastructures\Repositories\Eloquent\Project\ProjectRepository::class
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
