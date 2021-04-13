<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AssignmentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\Assignment\AssignmentRepositoryInterface::class,
            \App\Infrastructures\Repositories\Eloquent\Assignment\AssignmentRepository::class
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
