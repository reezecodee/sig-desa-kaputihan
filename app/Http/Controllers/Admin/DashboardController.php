<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Building;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Village;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $data = [
            'penduduk' => Village::value('jumlah_penduduk'),
            'jadwal' => Schedule::whereYear('created_at', date('Y'))->count(),
            'bangunan' => Building::count(),
            'admin' => User::count()
        ];

        return Inertia::render('Admin/Dashboard/Index', compact('title', 'data'));
    }
}
