<?php

namespace App\Providers;

use App\Repositories\BlogRepository;
use App\Services\BlogService;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(BlogRepository::class, function ($app) {
            return new BlogRepository();
        });
    
        $this->app->singleton(BlogService::class, function ($app) {
            return new BlogService($app->make(BlogRepository::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
    }
}
