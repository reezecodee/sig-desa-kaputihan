<?php

namespace App\Repositories;

use App\Models\Building;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class LandingRepository
{
    public function dataVillage()
    {
        try {
            return Setting::first();
        } catch (\Exception $e) {
            throw new \Exception('Terjadi kesalahan saat mencoba mengambil data');
        }
    }

    public function buildingsCount()
    {
        try {
            // $counts = Building::select('kategori_bangunan', DB::raw('COUNT(*) as total'))
            //     ->whereIn('kategori_bangunan', ['Ibadah', 'Pemerintahan', 'Pendidikan', 'Kesehatan', 'Usaha', 'Olahraga', 'Keamanan', 'Lainnya'])
            //     ->groupBy('kategori_bangunan')
            //     ->pluck('total', 'kategori_bangunan');
            $counts = [];

            return [
                'ibadah' => $counts['Ibadah'] ?? 0,
                'pemerintahan' => $counts['Pemerintahan'] ?? 0,
                'pendidikan' => $counts['Pendidikan'] ?? 0,
                'kesehatan' => $counts['Kesehatan'] ?? 0,
                'usaha' => $counts['Usaha'] ?? 0,
                'olahraga' => $counts['Olahraga'] ?? 0,
                'keamanan' => $counts['Keamanan'] ?? 0,
                'lainnya' => $counts['Lainnya'] ?? 0,
            ];
        } catch (\Exception $e) {
            throw new \Exception('Terjadi kesalahan saat mencoba mengambil data');
        }
    }

    public function paginateBuildings($category)
    {
        return Building::where('kategori_bangunan', $category)->paginate(4);
    }

    public function getBuilding($slug)
    {
        return Building::where('slug', $slug)->first();
    }
}
