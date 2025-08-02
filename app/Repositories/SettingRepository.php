<?php

namespace App\Repositories;

use App\Models\Setting;
use App\Models\VillageProfile;

class SettingRepository
{
    public function findFirst()
    {
        try {
            return Setting::first();
        } catch (\Exception $e) {
            throw new \Exception('Terjadi kesalahan saat mencoba mengambil data');
        }
    }

    public function update($data)
    {
        try {
            $setting = Setting::findOrFail($this->findFirst()->id);
            
            return $setting->update($data);
        } catch (\Exception $e) {
            throw new \Exception('Terjadi kesalahan saat mencoba memperbarui data');
        }
    }

    public function updateVillageProfile($data)
    {
        try {
            $village = VillageProfile::first();
            
            return $village->update($data);
        } catch (\Exception $e) {
            throw new \Exception('Terjadi kesalahan saat mencoba memperbarui data');
        }
    }
}
