<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->middleware(['app-layout', 'guest'])->controller(AuthController::class)->group(function(){
    Route::get('login', 'login')->name('login');
    Route::post('proses-login', 'loginHandler')->name('auth.loginProcess');
});

Route::post('auth/logout', [AuthController::class, 'logout'])->name('logout');