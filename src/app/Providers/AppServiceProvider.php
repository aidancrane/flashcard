<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
        else
        {
            $this->app['request']->server->set('HTTPS', true);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    //public function boot(Charts $charts)
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        // $charts->register([
        //     \App\Charts\SetCramResults::class,
        //     \App\Charts\FlashcardChart::class,
        // ]);
    }
}
