<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LandingController extends Controller
{
    public function index()
    {
        $title = 'Selamat Datang di Sistem Infromasi Desa Kaputihan';

        return Inertia::render('Landing/Index', compact('title'));
    }
}
