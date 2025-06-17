<?php

use App\Http\Controllers\Landing\LandingController;
use Illuminate\Support\Facades\Route;

Route::middleware(['landing-layout'])->controller(LandingController::class)->group(function(){
    Route::get('/', 'index')->name('landing.index');
    Route::get('jadwal-kegiatan-desa', 'schedule')->name('landing.schedule');
    Route::prefix('bangunan-desa')->group(function(){
        Route::get('/{category}', 'buildingList')->name('landing.buildingList');
        Route::get('informasi/{slug}', 'buildingInformation')->name('landing.buildingInformation');
    });
});

Route::get('testing', function(){
    return view('test');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
