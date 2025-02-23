<?php

namespace App\Repositories;

use App\Models\Village;

class SettingRepository
{
    public function findFirst()
    {
        try {
            return Village::first();
        } catch (\Exception $e) {
            throw new \Exception('Terjadi kesalahan saat mencoba mengambil data');
        }
    }

    public function update($data)
    {
        try {
            $village = Village::findOrFail($this->findFirst()->id);
            
            return $village->update($data);
        } catch (\Exception $e) {
            throw new \Exception('Terjadi kesalahan saat mencoba memperbarui data');
        }
    }
}
