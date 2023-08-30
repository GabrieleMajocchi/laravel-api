<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Pagination\Paginator;                                        #AGGIUNGIAMO IL PAGINATOR

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();                                        #AGGIUNGIAMO IL PAGINATOR E USIAMO BOOTSTRAP
    }
}
