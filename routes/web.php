<?php

use App\Http\Controllers\API\APIController;
use App\Http\Controllers\API\ChartAPIController;
use App\Http\Controllers\Landing\LandingController;
use Illuminate\Support\Facades\Route;

Route::middleware(['landing-layout'])->controller(LandingController::class)->group(function(){
    Route::get('/', 'index')->name('landing.home');
    Route::get('batas-wilayah', 'territoryBoundary')->name('landing.map');
    Route::get('statistik-desa', 'statisticVillage')->name('landing.statistics');
    Route::prefix('bangunan-desa')->group(function(){
        Route::get('daftar/{id?}', 'buildings')->name('landing.buildings');
        Route::get('detail/{slug}', 'detailBuilding')->name('landing.detailBuilding');
    });
    Route::get('jadwal-kegiatan', 'schedule')->name('landing.schedule');
});

Route::controller(APIController::class)->group(function(){
    Route::get('jadwal-landing-page', 'scheduleForLanding')->name('landing.scheduleForLanding');
    Route::get('kategori-bangunan', 'buildingCategories')->name('landing.buildingCategories');
});

Route::get('charts', [ChartAPIController::class, 'charts'])->name('landing.charts');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
