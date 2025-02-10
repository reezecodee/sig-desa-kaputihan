<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::resource('blog', BlogController::class);

Route::prefix('profile')->controller(ProfileController::class)->group(function(){
    Route::get('/', 'index')->name('admin.profile');
    Route::post('edit-profile', 'editProfile')->name('admin.editProfile');
    Route::post('ganti-password', 'changePassword')->name('admin.changePassword');
});