<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Services\LandingService;
use Illuminate\Http\Request;
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

        $landingPageData = [
            'villageProfile' => $this->landingService->getVillageProfile(),
            'setting' => $this->landingService->getSetting(),
        ];

        return Inertia::render('LandingV2/Home/Index', compact('title', 'landingPageData'));
    }

    public function territoryBoundary()
    {
        $title = 'Peta batas-batas wilayah di Desa Kaputihan';

        return Inertia::render('LandingV2/TerritoryBoundary/Index', compact('title'));
    }

    public function statisticVillage()
    {
        $title = 'Statistik Desa';

        return Inertia::render('LandingV2/StatisticVillage/Index', compact('title'));
    }

    public function buildings(Request $request)
    {
        $title = 'Bangunan-bangunan di Desa Kaputihan';
        $filters = $request->only('search');

        $paginatedResult = Building::query()
            ->select(['id', 'kategori_id', 'slug', 'nama_bangunan', 'foto_bangunan', 'deskripsi'])
            ->with('category')
            ->when($request->input('search'), function ($query, $search) {
                $query->where('nama_bangunan', 'like', "%{$search}%")
                    ->orWhereHas('category', function ($kategoriQuery) use ($search) {
                        $kategoriQuery->where('nama_kategori', 'like', "%{$search}%");
                    });
            })->latest()
            ->paginate(6);

        $buildings = $paginatedResult->withQueryString();

        return Inertia::render('LandingV2/Buildings/Index', compact('title', 'buildings', 'filters'));
    }

    public function detailBuilding()
    {
        $title = 'Detail Bangunan';

        return Inertia::render('LandingV2/Buildings/Detail', compact('title'));
    }

    public function schedule()
    {
        $title = 'Jadwal Kegiatan Desa';

        return Inertia::render('LandingV2/Schedule/Index', compact('title'));
    }
}
