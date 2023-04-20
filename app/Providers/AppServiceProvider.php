<?php

namespace App\Providers;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('admin', function (User $user) {
            return $user->level == 'admin';
        });

        Gate::define('staff', function (User $user) {
            return $user->level == 'staff';
        });

        Gate::define('masyarakat', function (User $user) {
            return $user->level == 'masyarakat';
        });

        Gate::define('admin&staff', function (User $user) {
            return $user->level == 'admin' || $user->level == 'staff';
        });
    }
}
