<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->middleware(['app-layout'])->controller(AuthController::class)->group(function(){
    Route::get('login', 'login')->name('auth.login');
    Route::post('proses-login', 'processLogin')->name('auth.loginProcess');
});