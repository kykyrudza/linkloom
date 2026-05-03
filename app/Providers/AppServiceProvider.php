<?php

namespace App\Providers;

use App\Data\AuthUserData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view): void {
            $user = Auth::user();

            $view->with('currentUser', $user ? AuthUserData::fromModel($user) : null);
        });
    }
}
