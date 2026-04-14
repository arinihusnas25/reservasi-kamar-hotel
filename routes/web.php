<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;





Auth::routes();

Route::group(['middleware' => ['auth']], function () {

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile.index');
Route::post('/profile', [App\Http\Controllers\HomeController::class, 'Profile_update'])->name('profile.update');
Route::get('/ubah-password', [App\Http\Controllers\HomeController::class, 'password'])->name('password.index');
Route::post('/ubah-password', [App\Http\Controllers\HomeController::class, 'password_update'])->name('password.update');

Route::resource('/admin', App\Http\Controllers\AdminController::class);  

Route::resource('/tamu', App\Http\Controllers\TamuController::class);
Route::resource('/kamar', App\Http\Controllers\KamarController::class);
Route::resource('/reservasi', App\Http\Controllers\ReservasiController::class);
Route::resource('/pembayaran', App\Http\Controllers\PembayaranController::class);
 });