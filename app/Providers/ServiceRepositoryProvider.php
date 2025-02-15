<?php

namespace App\Providers;

use App\Repositories\BlogRepository;
use App\Repositories\ScheduleRepository;
use App\Repositories\UserRepository;
use App\Services\BlogService;
use App\Services\ScheduleService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class ServiceRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(BlogRepository::class, function ($app) {
            return new BlogRepository();
        });
    
        $this->app->singleton(BlogService::class, function ($app) {
            return new BlogService($app->make(BlogRepository::class));
        });

        $this->app->singleton(ScheduleRepository::class, function ($app) {
            return new ScheduleRepository();
        });
    
        $this->app->singleton(ScheduleService::class, function ($app) {
            return new ScheduleService($app->make(ScheduleRepository::class));
        });

        $this->app->singleton(UserRepository::class, function ($app) {
            return new UserRepository();
        });
    
        $this->app->singleton(UserService::class, function ($app) {
            return new UserService($app->make(UserRepository::class));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
