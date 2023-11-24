<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KinerjaController;
use App\Http\Controllers\MonevPdamController;
use App\Http\Controllers\PdamReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('kinerja', KinerjaController::class);
    Route::resource('pdam-report', PdamReportController::class);
    Route::resource('users', UserController::class);
    Route::resource('role', RoleController::class);

    Route::get('kinerja/create/period', [KinerjaController::class, 'showPeriod'])->name('kinerja.show.period');
    Route::post('kinerja/create/period', [KinerjaController::class, 'storePeriod'])->name('kinerja.store.period');

    Route::get('kinerja/create/finance', [KinerjaController::class, 'showFinace'])->name('kinerja.show.finance');
    Route::post('kinerja/create/finance', [KinerjaController::class, 'storeFinace'])->name('kinerja.store.finance');

    Route::get('kinerja/create/service', [KinerjaController::class, 'showService'])->name('kinerja.show.service');
    Route::post('kinerja/create/service', [KinerjaController::class, 'storeService'])->name('kinerja.store.service');

    Route::get('kinerja/create/production', [KinerjaController::class, 'showProduction'])->name('kinerja.show.production');
    Route::post('kinerja/create/production', [KinerjaController::class, 'storeProduction'])->name('kinerja.store.production');

    Route::get('kinerja/create/resource', [KinerjaController::class, 'showResource'])->name('kinerja.show.resource');
    Route::post('kinerja/create/resource', [KinerjaController::class, 'storeResource'])->name('kinerja.store.resource');

    Route::get('pdam/monev', [MonevPdamController::class, 'index'])->name('monev.pdam.index');
    Route::get('pdam/monev/{id}/detail', [MonevPdamController::class, 'detail'])->name('monev.pdam.detail');
    Route::put('pdam/monev/{id}/update', [MonevPdamController::class, 'updateCatatanMonitoring'])->name('monev.pdam.update');


    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login/process', [AuthController::class, 'loginProcess'])->name('login.process');
});
