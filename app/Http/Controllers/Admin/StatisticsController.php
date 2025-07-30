<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StatsFacilityInfrastructure;
use App\Models\StatsGeneralData;
use App\Models\StatsMainOccupation;
use App\Models\StatsPopulationCategory;
use App\Models\StatsPopulationGroup;
use App\Services\StatisticsService;
use Inertia\Inertia;

class StatisticsController extends Controller
{
    protected $statisticsService;

    public function __construct(StatisticsService $statisticsService)
    {
        $this->statisticsService = $statisticsService;
    }

    public function index()
    {
        $title = 'Statistik Data Desa';

        return Inertia::render('Admin/Statistics/Index', compact('title'));
    }

    public function chartMenu($id)
    {
        $title = 'Menu Charts Statistik';
        $id = $id;

        return Inertia::render('Admin/Statistics/ChartMenu', compact('title', 'id'));
    }

    public function facility($surveyID, $category)
    {
        $title = 'Grafik Statistik Fasilitas';
        $id = $surveyID;
        $category = $category;

        return Inertia::render('Admin/Statistics/ChartMenuPage/FacilityInfrastructure', compact('title', 'id', 'category'));
    }

    public function generalData($surveyID, $category)
    {
        $title = 'Grafik Statistik Data Umum';
        $id = $surveyID;
        $category = $category;

        return Inertia::render('Admin/Statistics/ChartMenuPage/GeneralData', compact('title', 'id', 'category'));
    }

    public function occupation($surveyID)
    {
        $title = 'Grafik Statistik Mata Pencaharian';
        $id = $surveyID;

        return Inertia::render('Admin/Statistics/ChartMenuPage/Occupation', compact('title', 'id'));
    }

    public function populationCategory($surveyID, $category)
    {
        $title = 'Grafik Statistik Kategori Penduduk';
        $id = $surveyID;
        $category = $category;

        return Inertia::render('Admin/Statistics/ChartMenuPage/PopulationCategory', compact('title', 'id', 'category'));
    }

    public function populationGroup($surveyID)
    {
        $title = 'Grafik Statistik Kelompok Penduduk';
        $id = $surveyID;

        return Inertia::render('Admin/Statistics/ChartMenuPage/PopulationGroup', compact('title', 'id'));
    }

    public function destroyFacility($id)
    {
        $model = new StatsFacilityInfrastructure();

        try {
            $this->statisticsService->deleteDataChart($model, $id);

            session()->flash('success', 'Berhasil menghapus data fasilitas');
            return Inertia::location(back());
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(back());
        }
    }

    public function destroyGeneralData($id)
    {
        $model = new StatsGeneralData();

        try {
            $this->statisticsService->deleteDataChart($model, $id);

            session()->flash('success', 'Berhasil menghapus data umum');
            return Inertia::location(back());
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(back());
        }
    }

    public function destroyOccupation($id)
    {
        $model = new StatsMainOccupation();

        try {
            $this->statisticsService->deleteDataChart($model, $id);

            session()->flash('success', 'Berhasil menghapus data pekerjaan');
            return Inertia::location(back());
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(back());
        }
    }

    public function destroyPopulationCategory($id)
    {
        $model = new StatsPopulationCategory();

        try {
            $this->statisticsService->deleteDataChart($model, $id);

            session()->flash('success', 'Berhasil menghapus data kategori penduduk');
            return Inertia::location(back());
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(back());
        }
    }

    public function destroyPopulationGroup($id)
    {
        $model = new StatsPopulationGroup();

        try {
            $this->statisticsService->deleteDataChart($model, $id);

            session()->flash('success', 'Berhasil menghapus data kelompok penduduk');
            return Inertia::location(back());
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(back());
        }
    }
}
