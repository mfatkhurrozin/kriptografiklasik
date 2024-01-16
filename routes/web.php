<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\KriptografiController;
use App\Http\Middleware\CekUser;

Route::get('/', [LayoutController::class, 'index'])->middleware('auth');
Route::get('/home', [LayoutController::class, 'index'])->middleware('auth');

Route::controller(LoginController::class)->group(function (){
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout');

    Route::get('register', 'registerForm')->name('register.form');
    Route::post('register', 'register')->name('register');
});

Route::group(['middleware' => ['auth']],function(){
    Route::group(['middleware' => ['cekUser:1']],function(){
        // Kriptografi
        Route::get('zigzag', [KriptografiController::class, 'zigzagCipher']);
        Route::get('atbash', [KriptografiController::class, 'atbashCipher']);
        Route::get('shift', [KriptografiController::class, 'shiftCipher']);
        Route::get('vigenere', [KriptografiController::class, 'vigenereCipher']);
       
    });

});