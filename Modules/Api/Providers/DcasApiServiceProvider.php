<?php

namespace Modules\Api\Providers;

use Illuminate\Support\ServiceProvider;

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
        $this->app->bind('API', function() {
            return new Modules\Api\Entities\ApiHelper;
        });
    }
}