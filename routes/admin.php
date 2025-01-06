<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KamarController;
use App\Http\Controllers\Admin\PenghuniController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\PembayaranController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authLogin'])->name('authLogin');

    Route::middleware('auth:admin')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('kamar', KamarController::class);
        Route::resource('penghuni', PenghuniController::class);
        Route::resource('pesanan', PenghuniController::class);
        Route::resource('customer', CustomerController::class);
        Route::resource('pesanan', PesananController::class);
        Route::resource('pembayaran', PembayaranController::class);
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});