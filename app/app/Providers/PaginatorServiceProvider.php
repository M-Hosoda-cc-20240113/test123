<?php

namespace App\Providers;

use App\Infrastructures\Paginator\Laravel\Paginator;
use App\Services\Pagination\PaginatorInterface;
use Illuminate\Support\ServiceProvider;

class PaginatorServiceProvider extends ServiceProvider
{
    /**
     * RegisterUser services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
           PaginatorInterface::class,
           Paginator::class
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
