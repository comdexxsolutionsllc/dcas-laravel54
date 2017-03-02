<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {

    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Http\Middleware\LogLastUserActivity::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth'                  => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic'            => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings'              => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can'                   => \Illuminate\Auth\Middleware\Authorize::class,
        'guest'                 => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle'              => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'impersonate'           => \App\Http\Middleware\Impersonate::class,
        'role'                  => \Zizaco\Entrust\Middleware\EntrustRole::class,
        'permission'            => \Zizaco\Entrust\Middleware\EntrustPermission::class,
        'ability'               => \Zizaco\Entrust\Middleware\EntrustAbility::class,
        'admin'                 => \Modules\Internal\Http\Middleware\AdminMiddleware::class,
        'restrict.ip.main'      => \App\Http\Middleware\RestrictByIP::class,
        'restrict.ip.api'       => \Modules\Panel\Http\Middleware\RestrictByIP::class,
        'restrict.ip.chat'      => \Modules\Panel\Http\Middleware\RestrictByIP::class,
        'restrict.ip.internal'  => \Modules\Panel\Http\Middleware\RestrictByIP::class,
        'restrict.ip.messenger' => \Modules\Panel\Http\Middleware\RestrictByIP::class,
        'restrict.ip.panel'     => \Modules\Panel\Http\Middleware\RestrictByIP::class,
    ];
}
