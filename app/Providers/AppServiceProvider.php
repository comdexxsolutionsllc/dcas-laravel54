<?php

namespace App\Providers;

use App\ActivityExtend;
use App\User;
use DCASDomain\Observers\ActivityObserver;
use DCASDomain\Observers\UserObserver;
use DCASDomain\ViewComposers\DashboardComposer;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        \View::composer('*', DashboardComposer::class);

        User::observe(UserObserver::class);
        ActivityExtend::observe(ActivityObserver::class);
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'development') {
            $this->app->register(\Iber\Generator\ModelGeneratorProvider::class);
            $this->app->register(\MaddHatter\ViewGenerator\ServiceProvider::class);
        }
    }
}
