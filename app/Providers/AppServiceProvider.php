<?php

namespace App\Providers;

use App\Models\Village;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
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
    public function boot(): void
    {
        $village = Village::first();
        Vite::prefetch(concurrency: 3);
        Inertia::share([
            'village' => fn () => $village
        ]);
    }
}
