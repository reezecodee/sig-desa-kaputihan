<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BuildingController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserManagementController;
use Illuminate\Support\Facades\Route;

Route::middleware(['app-layout', 'auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('blog')->controller(BlogController::class)->group(function () {
        Route::get('/', 'index')->name('admin.blog');
        Route::get('daftar-blog', 'getBlogs')->name('admin.blogList');
        Route::get('buat-blog-baru', 'create')->name('admin.blogCreate');
        Route::post('simpan-blog-baru', 'store')->name('admin.blogSave');
        Route::get('edit-blog/{id}', 'edit')->name('admin.blogEdit');
        Route::post('perbarui-blog/{id}', 'update')->name('admin.blogUpdate');
        Route::delete('hapus-blog/{id}', 'destroy')->name('admin.blogDestroy');
    });

    Route::prefix('jadwal-kegiatan')->controller(ScheduleController::class)->group(function () {
        Route::get('/', 'index')->name('admin.schedule');
        Route::get('daftar-jadwal', 'getSchedules')->name('admin.scheduleList');
        Route::get('jadwal-calendar', 'getCalendars')->name('admin.calendar');
        Route::get('buat-jadwal', 'create')->name('admin.scheduleCreate');
        Route::post('tambah-jadwal', 'store')->name('admin.scheduleSave');
        Route::delete('hapus-jadwal/{id}', 'destroy')->name('admin.scheduleDestroy');
    });

    Route::prefix('bangunan')->controller(BuildingController::class)->group(function () {
        Route::get('/', 'index')->name('admin.building');
        Route::get('/tambah-bangunan', 'create')->name('admin.buildingCreate');
    });

    Route::prefix('pengaturan-desa')->controller(SettingController::class)->group(function () {
        Route::get('/', 'index')->name('admin.setting');
    });

    Route::prefix('manajemen-pengguna')->controller(UserManagementController::class)->group(function () {
        Route::get('/', 'index')->name('admin.userManagement');
        Route::get('daftar-pengguna', 'getUsers')->name('admin.userList');
        Route::get('tambah', 'create')->name('admin.userCreate');
        Route::post('simpan-pengguna', 'store')->name('admin.userSave');
        Route::get('pengguna/{id}/edit', 'edit')->name('admin.userEdit');
        Route::put('edit-pengguna/{id}', 'update')->name('admin.userUpdate');
        Route::delete('hapus-pengguna/{id}', 'destroy')->name('admin.userDestroy');
    });

    Route::prefix('profile')->controller(ProfileController::class)->group(function () {
        Route::get('/', 'index')->name('admin.profile');
        Route::post('edit-profile', 'editProfile')->name('admin.editProfile');
        Route::post('ganti-password', 'changePassword')->name('admin.changePassword');
    });
});
