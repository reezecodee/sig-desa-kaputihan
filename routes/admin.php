<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::prefix('/profile')->controller(ProfileController::class)->group(function(){
    Route::get('/', 'index')->name('admin.profile');
});