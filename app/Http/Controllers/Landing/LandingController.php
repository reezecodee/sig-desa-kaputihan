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

    public function blogList()
    {
        $title = 'Daftar Blog Desa Kaputihan';

        return Inertia::render('Landing/BlogList', compact('title'));
    }

    public function readBlog()
    {
        $title = 'Baca Blog: ';

        return Inertia::render('Landing/ReadBlog', compact('title'));
    }

    public function schedule()
    {
        $title = 'Jadwal Kegiatan Desa Kaputihan';

        return Inertia::render('Landing/Schedule', compact('title'));
    }

    public function buildingList()
    {
        $title = 'Daftar Bangunan';

        return Inertia::render('Landing/BuildingList', compact('title'));
    }

    public function buildingInformation()
    {
        $title = 'Informasi Bangunan';

        return Inertia::render('Landing/BuildingInformation', compact('title'));
    }
}
