<?php

namespace App\Listeners\Users;

use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;

class UponLogoutUpdateLastLoggedInAt {

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    /**
     * Handle the event.
     *
     * @param  Logout $event
     *
     * @return void
     */
    public function handle(Logout $event)
    {
        $event->user->last_logged_in_at = Carbon::now();
        $event->user->save();
    }
}
