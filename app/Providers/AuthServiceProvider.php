<?php

namespace App\Providers;

use App\Enums\RoleEnum;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            if ($user->role == RoleEnum::Superadmin) {
                return true;
            }
        });

        Gate::define('SuperAdmin', function ($user) {
            return $user->role == RoleEnum::Superadmin;
        });
        Gate::define('Admin', function ($user) {
            return $user->role == RoleEnum::Admin;
        });
        Gate::define('User', function ($user) {
            return $user->role == RoleEnum::User;
        });
        Gate::define('AdminUser', function ($user) {
            return $user->role != RoleEnum::Superadmin;
        });

        Gate::define('update-user', function ($user) {
            return $user->id === auth()->user()->id;
        });
    }
}
