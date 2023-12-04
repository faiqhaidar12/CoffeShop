<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoffeBeController;
use App\Http\Controllers\CoffeController;
use App\Http\Controllers\PelangganController;
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

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard.admin');
    Route::get('/coffe', [CoffeBeController::class, 'index'])->name('dashboard.coffe');
    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('dashboard.pelanggan');
});
Route::get('/', [CoffeController::class, 'index']);
