<?php

use App\Http\Controllers\User\KamarController as UserKamarController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\PesananController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\PembayaranController;
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

include 'admin.php';

Route::get('/', function () {
    return view('user/home');
});
Route::get('home', function () {
    return view('user/home');
});
Route::get('about', function () {
    return view('user/about');
});
Route::get('contact', function () {
    return view('user/contact');
});
// Route::get('infokamar', function () {
//     return view('user/infokamar');
// });
Route::get('pemesanan', function () {
    return view('user/pemesanan');
});
// Route::get('pembayaran', function () {
//     return view('user/pembayaran');
// });
// Route::get('/kamar/detail', [KamarController::class, 'show']);
// Route::get('dashboard', function () {
//     return view('Admin/dashboard');
// });
// Route::get('infokamar2', function () {
//     return view('user/infokamar2');
// });
// Route::get('infokamar3', function () {
//     return view('user/infokamar3');
// });
// // Define the 'kamar' route
// Route::get('kamar', function () {
//     return view('user/kamar');
// })->name('kamar');

Route::controller(LoginController::class)->group(function(){
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'store')->name('login.store');
});
Route::resource('register', RegisterController::class);

Route::middleware('auth:customer')->group(function(){
    
    Route::get('/kamar/{kamar}/pesan', [UserKamarController::class, 'pesan'])->name('kamar.pesan');
    Route::post('/kamar/{kamar}/pesan', [UserKamarController::class, 'buatPesanan'])->name('kamar.buatPesanan');
    Route::resource('kamar', UserKamarController::class);
    Route::resource('pemesanan', PesananController::class);

    Route::post('/pembayaran/{pembayaran}/konfirmasi', [PembayaranController::class, 'konfirmasi'])->name('pembayaran.konfirmasi');
});

