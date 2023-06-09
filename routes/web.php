<?php

use App\Http\Controllers\BerandaAdministratorController;
use App\Http\Controllers\BerandaOperatorController;
use App\Http\Controllers\BerandaWaliController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('administrator')->middleware(['auth', 'auth.administrator'])->group(function () {
    // Ini route khusus administrator
    Route::get('beranda', [BerandaAdministratorController::class, 'index'])->name('administrator.beranda');
});

Route::prefix('operator')->middleware(['auth', 'auth.operator'])->group(function () {
    // Ini route khusus operator
    Route::get('beranda', [BerandaOperatorController::class, 'index'])->name('operator.beranda');
});

Route::prefix('wali')->middleware(['auth', 'auth.wali'])->group(function () {
    // Ini route khusus wali
    Route::get('beranda', [BerandaWaliController::class, 'index'])->name('wali.beranda');
});

Route::get('logout', function () {
    Auth::logout();
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
