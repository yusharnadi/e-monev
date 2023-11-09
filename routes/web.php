<?php

use App\Http\Controllers\KinerjaController;
use App\Http\Controllers\PdamReportController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('kinerja', KinerjaController::class);
Route::resource('pdam-report', PdamReportController::class);
Route::resource('users', KinerjaController::class);
Route::resource('role', KinerjaController::class);

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

Route::get('logout', [])->name('logout');
Route::get('/dashboard', [])->name('dashboard');
