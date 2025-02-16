<?php

use App\Http\Controllers\Landing\LandingController;
use Illuminate\Support\Facades\Route;

Route::middleware(['landing-layout'])->controller(LandingController::class)->group(function(){
    Route::get('/', 'index')->name('landing.index');
    Route::get('/daftar-blog', 'blogList')->name('landing.blog');
    Route::get('/baca-blog', 'readBlog')->name('landing.readBlog');
    Route::get('/jadwal-kegiatan-desa', 'schedule')->name('landing.schedule');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
