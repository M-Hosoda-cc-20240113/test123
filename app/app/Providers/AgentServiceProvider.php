<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AgentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\Agent\AgentRepositoryInterface::class,
            \App\Infrastructures\Repositories\Eloquent\Agent\AgentRepository::class
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
