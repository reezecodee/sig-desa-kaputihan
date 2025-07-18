<?php

use App\Http\Controllers\API\APIController;
use App\Http\Controllers\Landing\LandingController;
use Illuminate\Support\Facades\Route;

Route::middleware(['landing-layout'])->controller(LandingController::class)->group(function(){
    Route::get('/', 'index')->name('landing.home');
    Route::get('batas-wilayah', 'territoryBoundary')->name('landing.map');
    Route::get('statistik-desa', 'statisticVillage')->name('landing.statistics');
    Route::prefix('bangunan-desa')->group(function(){
        Route::get('/', 'buildings')->name('landing.buildings');
        Route::get('detail/{slug}', 'detailBuilding')->name('landing.detailBuilding');
    });
    Route::get('jadwal-kegiatan', 'schedule')->name('landing.schedule');
});

Route::get('jadwal-landing-page', [APIController::class, 'scheduleForLanding'])->name('landing.scheduleForLanding');
Route::get('kategori-bangunan', [APIController::class, 'buildingCategories'])->name('landing.buildingCategories');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
