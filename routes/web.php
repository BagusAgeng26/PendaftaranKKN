<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KknController;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/mahasiswa/kkn', [KknController::class, 'showKknForm'])->name('mahasiswa.kkn');
    Route::post('/mahasiswa/kkn', [KknController::class, 'registerKkn']);
    Route::get('/mahasiswa/pengumuman', [KknController::class, 'showPengumumanForm'])->name('mahasiswa.pengumuman');
    Route::post('/mahasiswa/pengumuman', [KknController::class, 'pengumuman']);

    Route::get('/admin/dashboard', [KknController::class, 'showAdminDashboard'])->name('admin.dashboard');
    Route::post('/admin/kkn/approve/{id}', [KknController::class, 'approveKkn'])->name('admin.kkn.approve');
});

