<?php

namespace App\Repositories;

use App\Models\Map;

class LocationRepository
{
    public function store($data)
    {
        try {
            return Map::create($data);
        } catch (\Exception $e) {
            throw new \Exception('Terjadi kesalahan saat mencoba menambahkan data');
        }
    }

    public function lists()
    {
        $locations = Map::orderBy('created_at', 'desc')->get();

        return $locations;
    }

    public function destroy($id)
    {
        try {
            $location = Map::findOrFail($id);

            return $location->delete();
        } catch (\Exception $e) {
            throw new \Exception('Terjadi kesalahan saat mencoba menghapus data');
        }
    }
}
