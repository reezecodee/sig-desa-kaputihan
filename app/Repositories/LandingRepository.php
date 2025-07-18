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
            ->simplePaginate($perPage);

        return $categories;
    }
}
