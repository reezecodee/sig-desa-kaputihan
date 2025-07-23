<?php

namespace App\Repositories;

use App\Models\Building;
use App\Models\Category;
use App\Models\Setting;
use App\Models\VillageProfile;
use Illuminate\Support\Facades\DB;

class LandingRepository
{
    public function getBuilding($slug)
    {
        return Building::where('slug', $slug)->first();
    }

    public function villageProfile()
    {
        return VillageProfile::first();
    }

    public function categories(int $perPage = 6)
    {
        $categories = Category::select(['id', 'nama_kategori', 'icon', 'deskripsi'])
            ->withCount('buildings')
            ->simplePaginate($perPage);

        return $categories;
    }

    public function setting()
    {
        $setting = Setting::select(['nama_kades', 'periode', 'pesan_kades', 'logo', 'logo_aktif', 'foto_organisasi'])->firstOrFail();

        return $setting;
    }
}
