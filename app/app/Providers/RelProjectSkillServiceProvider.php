<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RelProjectSkillServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\RelProjectSkill\RelProjectSkillRepositoryInterface::class,
            \App\Infrastructures\Repositories\Eloquent\RelProjectSkill\RelProjectSkillRepository::class
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
