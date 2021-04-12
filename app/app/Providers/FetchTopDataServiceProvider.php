<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Top\FetchTopDataRepositoryInterface;
use App\Infrastructures\Repositories\Eloquent\Top\TopRepository;

class FetchTopDataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
        
        $this->app->bind(
            \App\Services\Top\FetchTopDataRepositoryInterface::class,
            \App\Infrastructures\Repositories\Eloquent\Top\TopRepository::class
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
