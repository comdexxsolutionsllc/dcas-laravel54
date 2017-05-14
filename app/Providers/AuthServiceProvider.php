<?php

namespace App\Providers;

use App\Modules\Internal\Models\Category;
use App\Modules\Internal\Models\Comment;
use App\Modules\Internal\Models\Ticket;
use App\Permission;
use App\Policies\CategoryPolicy;
use App\Policies\CommentPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\RolePolicy;
use App\Policies\TicketPolicy;
use App\Role;
use Carbon\Carbon;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider {

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model'         => 'App\Policies\ModelPolicy',
        Category::class     => CategoryPolicy::class,
        Comment::class      => CommentPolicy::class,
        Permission::class   => PermissionPolicy::class,
        Role::class         => RolePolicy::class,
        Ticket::class       => TicketPolicy::class,
    ];


    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        Passport::tokensExpireIn(Carbon::now()->addDays(15));

        Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));
    }
}
