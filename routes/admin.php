<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BuildingController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\API\APIController;
use Illuminate\Support\Facades\Route;

Route::get('daftar-lokasi/{type}', [LocationController::class, 'getLocations'])->name('admin.locationList');
Route::get('jadwal-admin-page', [APIController::class, 'scheduleForAdmin'])->name('landing.scheduleForAdmin');


Route::middleware(['app-layout', 'auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('lokasi')->controller(LocationController::class)->group(function(){
        Route::post('simpan-lokasi', 'store')->name('admin.locationSave');
        Route::delete('hapus-lokasi/{id}', 'destroy')->name('admin.locationDestroy');
    });

    Route::prefix('bangunan')->controller(BuildingController::class)->group(function () {
        Route::get('/', 'index')->name('admin.building');
        Route::get('tambah-bangunan', 'create')->name('admin.buildingCreate');
        Route::post('tambah-bangunan-baru', 'store')->name('admin.buildingSave');
        Route::get('daftar-bangunan/{category}', 'getBuildings')->name('admin.buildingList');
        Route::get('edit-bangunan/{id}', 'edit')->name('admin.buildingEdit');
        Route::post('update-bangunan/{id}', 'update')->name('admin.buildingUpdate');
        Route::delete('hapus-bangunan/{id}', 'destroy')->name('admin.buildingDestroy');
    });

    Route::prefix('pengaturan-desa')->controller(SettingController::class)->group(function () {
        Route::get('/', 'index')->name('admin.setting');
        Route::post('perbarui-pengaturan', 'update')->name('admin.settingUpdate');
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
