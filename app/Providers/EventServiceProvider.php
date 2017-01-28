<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Illuminate\Auth\Events\Lockout'           => [
            'App\Listeners\Users\UponLoginLockout',
        ],
        'Illuminate\Auth\Events\Login'             => [
            'App\Listeners\Users\UpdateLastLoggedInAt',
        ],
        'Illuminate\Auth\Events\Logout'            => [
            'App\Listeners\Users\UponLogoutUpdateLastLoggedInAt',
        ],
        'Illuminate\Database\Events\QueryExecuted' => [
            'App\Listeners\Database\LogQueryExecution',
        ],
        'Illuminate\Mail\Events\MessageSending'    => [
            'App\Listeners\Mail\LogSentMessage',
        ],
    ];


    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
