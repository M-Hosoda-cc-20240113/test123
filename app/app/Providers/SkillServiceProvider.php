<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Infrastructures\Repositories\Eloquent\Admin\Skill\SkillRepository;
use App\Services\Admin\Skill\SkillRepositoryInterface;

class SkillServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\Admin\Skill\SkillRepositoryInterface::class,
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
