<?php

namespace Modules\Chat\Http\Middleware;

use Closure;
use DCASDomain\Traits\GetRemoteIP;
use Illuminate\Http\Request;

class RestrictByIP {

    use GetRemoteIP;

    /**
     * @var array whitelist of IP addresses to allow viewing application.
     */
    protected $whitelist = [
        '76.186.126.92'
    ];


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return (self::isAllowed()) ? $next($request) : abort(403,
            "Your IP address is not in the application's whitelist.  Please contact the system administrator for more information.");
    }
}
