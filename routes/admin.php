<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BuildingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\API\APIController;
use App\Http\Controllers\Datatable\BuildingDatatableController;
use App\Http\Controllers\Datatable\CategoryDatatableController;
use App\Http\Controllers\Datatable\FacilityDatatableController;
use App\Http\Controllers\Datatable\GeneralDatatableController;
use App\Http\Controllers\Datatable\LocationDatatableController;
use App\Http\Controllers\Datatable\OccupationDatatableController;
use App\Http\Controllers\Datatable\PopuCategoryDatatableController;
use App\Http\Controllers\Datatable\PopuGroupDatatableController;
use App\Http\Controllers\Datatable\ReportDatatableController;
use App\Http\Controllers\Datatable\ScheduleDatatableController;
use App\Http\Controllers\Datatable\StatisticsDatatableController;
use App\Http\Controllers\Datatable\UserDatatableController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('daftar-titik-lokasi', [LocationController::class, 'getLocations'])->name('admin.locationList');
Route::get('jadwal-admin-page', [APIController::class, 'scheduleForAdmin'])->name('landing.scheduleForAdmin');

Route::middleware(['app-layout', 'auth'])->group(function () {
    Route::name('admin.')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::prefix('lokasi')->controller(LocationController::class)->group(function () {
            Route::post('simpan-lokasi', 'store')->name('locationSave');
            Route::delete('hapus-lokasi/{id}', 'destroy')->name('locationDestroy');
        });

        Route::prefix('pengaturan-desa')->controller(SettingController::class)->group(function () {
            Route::get('/', 'index')->name('setting');
            Route::post('perbarui-pengaturan', 'update')->name('settingUpdate');
        });

        Route::prefix('jadwal-kegiatan-desa')->controller(ScheduleController::class)->group(function () {
            Route::get('/', 'index')->name('schedule');
            Route::post('tambah-jadwal', 'store')->name('scheduleSave');
            Route::delete('hapus-jadwal/{id}', 'destroy')->name('scheduleDestroy');
        });

        Route::prefix('statistik-data-desa')->controller(StatisticsController::class)->group(function () {
            Route::get('/', 'index')->name('statistics');
            Route::get('menu-charts/{surveyID}', 'chartMenu')->name('chartMenu');

            Route::post('tambah-survey', 'storeSurvey')->name('surveySave');
            Route::patch('update-status-survey{surveyID}', 'updateStatusSurvey')->name('surveyUpdateStatus');
            Route::delete('hapus-survey/{id}', 'destroySurvey')->name('destroySurvey');

            Route::name('chart.')->group(function () {
                Route::get('grafik-fasilitas/{surveyID}/{category}', 'facility')->name('facility');
                Route::get('grafik-data-umum/{surveyID}/{category}', 'generalData')->name('generalData');
                Route::get('grafik-mata-pencaharian/{surveyID}', 'occupation')->name('occupation');
                Route::get('grafik-kategori-populasi/{surveyID}/{category}', 'populationCategory')->name('populationCategory');
                Route::get('grafik-kelompok-populasi/{surveyID}', 'populationGroup')->name('populationGroup');
            });

            Route::delete('hapus-fasilitas/{id}', 'destroyFacility')->name('chartFacilityDestroy');
            Route::delete('hapus-data-umum/{id}', 'destroyGeneralData')->name('chartGeneralDestroy');
            Route::delete('hapus-pekerjaan/{id}', 'destroyOccupation')->name('chartOccupationDestroy');
            Route::delete('hapus-kategori-populasi/{id}', 'destroyPopulationCategory')->name('popuCategoryDestroy');
            Route::delete('hapus-kelompok-populasi/{id}', 'destroyPopulationGroup')->name('popuGroupDestroy');
        });

        Route::prefix('kategori-bangunan')->controller(CategoryController::class)->group(function () {
            Route::get('/', 'index')->name('category');
            Route::post('tambah-kategori', 'store')->name('categorySave');
            Route::get('edit-kategori/{id}', 'edit')->name('categoryEdit');
            Route::post('udpdate-kategori/{id}', 'update')->name('categoryUpdate');
        });

        Route::prefix('kategori-bangunan')->controller(BuildingController::class)->group(function () {
            Route::get('detail/{categoryID}', 'index')->name('building');
            Route::get('tambah-bangunan', 'create')->name('buildingCreate');
            Route::post('tambah-bangunan-baru', 'store')->name('buildingSave');
            Route::get('edit-bangunan/{id}', 'edit')->name('buildingEdit');
            Route::post('update-bangunan/{id}', 'update')->name('buildingUpdate');
            Route::delete('hapus-bangunan/{id}', 'destroy')->name('buildingDestroy');
        });

        Route::prefix('laporan-masuk')->controller(ReportController::class)->group(function () {
            Route::get('/', 'index')->name('report');
            Route::get('/detail/{reportID}', 'detail')->name('reportDetail');
        });

        Route::prefix('manajemen-pengguna')->controller(UserManagementController::class)->group(function () {
            Route::get('/', 'index')->name('userManagement');
            Route::get('tambah', 'create')->name('userCreate');
            Route::post('simpan-pengguna', 'store')->name('userSave');
            Route::get('pengguna/{id}/edit', 'edit')->name('userEdit');
            Route::put('edit-pengguna/{id}', 'update')->name('userUpdate');
            Route::delete('hapus-pengguna/{id}', 'destroy')->name('userDestroy');
        });

        Route::prefix('profile')->controller(ProfileController::class)->group(function () {
            Route::get('/', 'index')->name('profile');
            Route::post('edit-profile', 'editProfile')->name('editProfile');
            Route::post('ganti-password', 'changePassword')->name('changePassword');
        });
    });


    Route::name('datatable.')->group(function () {
        Route::get(
            'daftar-lokasi/{type}',
            [LocationDatatableController::class, 'getLocations']
        )->name('locationList');
        Route::get(
            'daftar-jadwal',
            [ScheduleDatatableController::class, 'getSchedules']
        )->name('schedule');
        Route::get(
            'daftar-bangunan/{categoryID}',
            [BuildingDatatableController::class, 'getBuildings']
        )->name('buildings');
        Route::get(
            'daftar-survey',
            [StatisticsDatatableController::class, 'getSurveys']
        )->name('surveys');
        Route::get(
            'daftar-kategori',
            [CategoryDatatableController::class, 'getCategories']
        )->name('categories');
        Route::get(
            'daftar-laporan',
            [ReportDatatableController::class, 'getReports']
        )->name('reports');
        Route::get(
            'daftar-pengguna',
            [UserDatatableController::class, 'getUsers']
        )->name('users');


        Route::get(
            'daftar-fasilitas/{surveyID}/{category}',
            [FacilityDatatableController::class, 'getFacilities']
        )->name('facilities');
        Route::get(
            'daftar-data-umum/{surveyID}/{category}',
            [GeneralDatatableController::class, 'getGeneralData']
        )->name('generalData');
        Route::get(
            'daftar-mata-pencaharian/{surveyID}',
            [OccupationDatatableController::class, 'getOccupations']
        )->name('occupations');
        Route::get(
            'daftar-kategori-populasi/{surveyID}/{category}',
            [PopuCategoryDatatableController::class, 'getPopulationCategories']
        )->name('populationCategories');
        Route::get(
            'daftar-kelompok-populasi/{surveyID}',
            [PopuGroupDatatableController::class, 'getPopulationGroups']
        )->name('populationGroups');
    });

    Route::get('jadwal-admin-page', [APIController::class, 'scheduleForAdminPage'])->name('admin.scheduleForAdminPage');
});
