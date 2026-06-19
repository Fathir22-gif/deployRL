<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\SearchServiceContract;
use App\Services\SearchService;
use App\Contracts\WishlistServiceContract;
use App\Services\WishlistService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            SearchServiceContract::class,
            SearchService::class
        );

        $this->app->bind(
            WishlistServiceContract::class,
            WishlistService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}