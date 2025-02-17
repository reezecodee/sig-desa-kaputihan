<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BuildingController extends Controller
{
    public function index()
    {
        $title = 'Bangunan Umum';

        return Inertia::render('Admin/Building/Index', compact('title'));
    }
}
