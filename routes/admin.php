<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ComplaintController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::prefix('blog')->controller(BlogController::class)->group(function(){
    Route::get('/', 'index')->name('admin.blog');
    Route::get('daftar-blog', 'getBlogs')->name('admin.blogList');
    Route::get('buat-blog-baru', 'create')->name('admin.blogCreate');
    Route::post('simpan-blog-baru', 'store')->name('admin.blogSave');
    Route::get('edit-blog', 'edit')->name('admin.blogEdit');
    Route::put('perbarui-blog', 'update')->name('admin.blogUpdate');
});

Route::prefix('pengaduan')->controller(ComplaintController::class)->group(function(){
    Route::get('/', 'index')->name('admin.complaint');
    Route::get('daftar-aduan', 'getComplaints')->name('admin.complaintList');
    Route::get('tanggapi', 'respond')->name('admin.respond');
    Route::post('kirim-tanggapan', 'sendRespond')->name('admin.sendRespond');
});

Route::prefix('jadwal-kegiatan')->controller(ScheduleController::class)->group(function(){
    Route::get('/', 'index')->name('admin.schedule');
    Route::get('daftar-jadwal', 'getSchedules')->name('admin.scheduleList');
    Route::get('jadwal-calendar', 'getCalendars')->name('admin.calendar');
    Route::post('tambah-jadwal', 'addSchedule')->name('admin.addSchedule');
});

Route::prefix('profile')->controller(ProfileController::class)->group(function(){
    Route::get('/', 'index')->name('admin.profile');
    Route::post('edit-profile', 'editProfile')->name('admin.editProfile');
    Route::post('ganti-password', 'changePassword')->name('admin.changePassword');
});