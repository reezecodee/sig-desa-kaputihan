<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Schedule;
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
            'admin' => User::count()
        ];

        return Inertia::render('Admin/Dashboard/Index', compact('title', 'data'));
    }
}
