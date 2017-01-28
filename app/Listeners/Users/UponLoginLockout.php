<?php

namespace App\Listeners\Users;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\UponUserLoginLockout;
use Illuminate\Support\Facades\Mail;

class UponLoginLockout {

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
     * @param  Lockout $event
     *
     * @return void
     */
    public function handle(Lockout $event)
    {
        is_null(\App\User::where('email',
            $event->request->email)->first()) ? false : Mail::to($event->request->email)->send(new UponUserLoginLockout);
    }
}
