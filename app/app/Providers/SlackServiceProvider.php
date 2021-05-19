<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SlackServiceProvider extends ServiceProvider
{
    /**
     * RegisterUser services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'slack',
            'App\Services\SlackNotification\SlackService'
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
