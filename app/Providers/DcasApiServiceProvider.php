<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Api\Facades\ApiHelper;

class DcasApiServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function register()
    {
        $this->app->bind('apihelper', 'App\Modules\Api\Models\ApiHelper');
    }
}