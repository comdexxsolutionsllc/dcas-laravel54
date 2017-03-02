<?php

namespace Modules\Messenger\Http\Middleware;

use Closure;
use DCASDomain\Traits\GetRemoteIP;
use Illuminate\Http\Request;

class RestrictByIP {

    use \GetRemoteIP;


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
        return $next($request);
    }
}
