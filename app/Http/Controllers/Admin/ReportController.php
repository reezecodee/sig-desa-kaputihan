<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReportController extends Controller
{
    public function index()
    {
        $title = 'Laporan Masuk';

        return Inertia::render('Admin/Report/Index', compact('title'));
    }
}
