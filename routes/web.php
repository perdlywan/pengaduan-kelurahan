<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\StaffController;

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
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::prefix('pengaduan')->middleware('auth')->group(function () {
    Route::get('/', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::post('/', [PengaduanController::class, 'store'])->name('pengaduan.store');
    Route::get('/{pengaduan}/edit', [PengaduanController::class, 'edit']);
    Route::put('/{pengaduan}', [PengaduanController::class, 'update'])->name('pengaduan.update');
    Route::delete('/{pengaduan}', [PengaduanController::class, 'destroy']);
});

Route::prefix('masyarakat')->middleware('auth')->group(function () {
    Route::get('/', [MasyarakatController::class, 'index']);
    Route::get('/add', [MasyarakatController::class, 'add']);
    Route::post('/', [MasyarakatController::class, 'store']);
    Route::get('/{masyarakat:username}/edit', [MasyarakatController::class, 'edit']);
    Route::put('/{masyarakat}', [MasyarakatController::class, 'update']);
    Route::delete('/{masyarakat}', [MasyarakatController::class, 'destroy']);
});

Route::prefix('staff')->middleware('auth')->group(function () {
    Route::get('/', [StaffController::class, 'index']);
    Route::get('/add', [StaffController::class, 'add']);
    Route::post('/', [StaffController::class, 'store']);
    Route::get('/{staff:username}/edit', [StaffController::class, 'edit']);
    Route::put('/{staff}', [StaffController::class, 'update']);
    Route::delete('/{staff}', [StaffController::class, 'destroy']);
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/add', [AdminController::class, 'add']);
    Route::post('/', [AdminController::class, 'store']);
    Route::get('/{admin:username}/edit', [AdminController::class, 'edit']);
    Route::put('/{admin}', [AdminController::class, 'update']);
    Route::delete('/{admin}', [AdminController::class, 'destroy']);
});