<?php

namespace App\Repositories;

use App\Models\VillageProfile;

class SettingRepository
{
    public function findFirst()
    {
        try {
            return VillageProfile::first();
        } catch (\Exception $e) {
            throw new \Exception('Terjadi kesalahan saat mencoba mengambil data');
        }
    }

    public function update($data)
    {
        try {
            $village = VillageProfile::findOrFail($this->findFirst()->id);
            
            return $village->update($data);
        } catch (\Exception $e) {
            throw new \Exception('Terjadi kesalahan saat mencoba memperbarui data');
        }
    }
}
