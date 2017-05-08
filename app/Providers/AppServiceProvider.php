<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        \View::composer('layouts.app', function ($view)
        {
            $view->with('users', \App\User::all());
        });
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'development')
        {
            $this->app->register(\Iber\Generator\ModelGeneratorProvider::class);
            $this->app->register(\MaddHatter\ViewGenerator\ServiceProvider::class);
        }
    }
}
