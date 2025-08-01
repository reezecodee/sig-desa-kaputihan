<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Category;
use App\Models\Map;
use App\Models\Report;
use App\Models\Schedule;
use App\Models\SurveyYear;
use App\Models\User;
use App\Models\VillageProfile;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $data = [
            'penduduk' => VillageProfile::value('jumlah_penduduk'),
            'jadwal' => Schedule::whereYear('created_at', date('Y'))->count(),
            'bangunan' => Building::count(),
            'admin' => User::count(),
            'kategori' => Category::count(),
            'laporan' => Report::count(),
            'survey' => SurveyYear::count(),
            'lokasi' => Map::count(),
        ];

        return Inertia::render('Admin/Dashboard/Index', compact('title', 'data'));
    }
}
