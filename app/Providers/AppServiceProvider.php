<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

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
    // public function boot(): void 12-02-2025
    // {
    //     Vite::prefetch(concurrency: 3);
    // }

    public function boot(): void
    {
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        Inertia::share([
            'auth' => function () {
                return [
                    'user' => auth()->user() ? [
                        'id' => auth()->user()->id,
                        'name' => auth()->user()->name,
                        'company_name' => auth()->user()->company_name,
                        'mobile_number' => auth()->user()->mobile_number,
                        'email' => auth()->user()->email,
                    ] : null,
                ];
            },
        ]);
    }
}
