<?php

use App\Http\Controllers\Api\KinerjaPdamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('kinerja/periode-year', [KinerjaPdamController::class, 'getPeriodeByCurrenyYear'])->name('kinerja.periode.year');
Route::get('kinerja/year', [KinerjaPdamController::class, 'getPenilaianYear'])->name('kinerja.year');
