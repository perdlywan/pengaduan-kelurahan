<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\Users\AdminController;
use App\Http\Controllers\MasyarakatController;

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
    return view('index');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('/pengaduan', PengaduanController::class);
Route::resource('/users/admin', AdminController::class);
Route::prefix('masyarakat')->group(function () {
    Route::get('/', [MasyarakatController::class, 'index']);
});
