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
}
