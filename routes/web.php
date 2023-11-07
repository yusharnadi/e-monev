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

Route::get('logout', [])->name('logout');
Route::get('/dashboard', [])->name('dashboard');
