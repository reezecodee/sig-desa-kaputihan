<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SettingController extends Controller
{
    public function index()
    {
        $title = 'Pengaturan Desa';

        return Inertia::render('Admin/Setting/Index', compact('title'));
    }
}
