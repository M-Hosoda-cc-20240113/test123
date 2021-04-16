<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RelLevelSkillUserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\RelLevelSkillUser\RelLevelSkillUSerRepositoryInterface::class,
            \App\Infrastructures\Repositories\Eloquent\RelLevelSkillUser\RelLevelSkillUserRepository::class
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
