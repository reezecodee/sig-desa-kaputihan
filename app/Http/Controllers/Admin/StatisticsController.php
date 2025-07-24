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
}
