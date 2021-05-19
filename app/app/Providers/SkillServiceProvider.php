<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Infrastructures\Repositories\Eloquent\Skill\SkillRepository;
use App\Services\Skill\SkillRepositoryInterface;

class SkillServiceProvider extends ServiceProvider
{
    /**
     * RegisterUser services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\Skill\SkillRepositoryInterface::class,
            \App\Infrastructures\Repositories\Eloquent\Skill\SkillRepository::class
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
