<?php

namespace App\Providers;

use App\Http\Services\KinerjaService;
use App\Http\Services\KinerjaServiceInterface;
use App\Http\Services\LaporanTriwulanService;
use App\Http\Services\LaporanTriwulanServiceInterface;
use App\Http\Services\PdamReportService;
use App\Http\Services\PdamReportServiceInterface;
use App\Http\Services\UserService;
use App\Http\Services\UserServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(KinerjaServiceInterface::class, KinerjaService::class);
        $this->app->bind(PdamReportServiceInterface::class, PdamReportService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(LaporanTriwulanServiceInterface::class, LaporanTriwulanService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
    }
}
