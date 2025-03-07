<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Services\LandingService;
use Inertia\Inertia;

class LandingController extends Controller
{
    protected $landingService;

    public function __construct(LandingService $landingService)
    {
        $this->landingService = $landingService;
    }

    public function index()
    {
        $title = 'Selamat Datang di Sistem Infromasi Geografis Desa Kaputihan';
        $buildings = $this->landingService->getBuildingsCount();

        return Inertia::render('Landing/Index', compact('title', 'buildings'));
    }

    public function schedule()
    {
        $title = 'Jadwal Kegiatan Desa Kaputihan';

        return Inertia::render('Landing/Schedule', compact('title'));
    }

    public function buildingList($category)
    {
        $buildings = $this->landingService->buildingPaginate($category);

        return Inertia::render('Landing/BuildingList', compact('buildings'));
    }

    public function buildingInformation($slug)
    {
        $title = 'Informasi Bangunan';
        $building = $this->landingService->getBuildingWithSlug($slug);

        return Inertia::render('Landing/BuildingInformation', compact('title', 'building'));
    }
}
