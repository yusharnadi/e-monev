<?php

namespace App\Providers;

use App\Http\Services\KinerjaService;
use App\Http\Services\KinerjaServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(KinerjaServiceInterface::class, KinerjaService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
