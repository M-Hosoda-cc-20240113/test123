<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Infrastructures\Repositories\Eloquent\Admin\Project\ProjectRepository;
use App\Services\Admin\Project\ProjectRepositoryInterface;


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
            \App\Services\Admin\Project\ProjectRepositoryInterface::class,
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
