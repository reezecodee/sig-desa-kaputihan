<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StatisticsController extends Controller
{
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

    public function facility()
    {
        $title = 'Grafik Statistik Fasilitas';

        return Inertia::render('Admin/Statistics/ChartMenuPage/FacilityInfrastructure', compact('title'));
    }

    public function generalData()
    {
        $title = 'Grafik Statistik Data Umum';

        return Inertia::render('Admin/Statistics/ChartMenuPage/GeneralData', compact('title'));
    }

    public function occupation()
    {
        $title = 'Grafik Statistik Mata Pencaharian';

        return Inertia::render('Admin/Statistics/ChartMenuPage/Occupation', compact('title'));
    }

    public function populationCategory()
    {
        $title = 'Grafik Statistik Kategori Populasi';

        return Inertia::render('Admin/Statistics/ChartMenuPage/PopulationCategory', compact('title'));
    }

    public function populationGroup()
    {
        $title = 'Grafik Statistik Kelompok Populasi';

        return Inertia::render('Admin/Statistics/ChartMenuPage/PopulationGroup', compact('title'));
    }
}
