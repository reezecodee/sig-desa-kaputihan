<?php

namespace App\Services;

use App\Repositories\SettingRepository;
use Illuminate\Support\Facades\Storage;

class SettingService
{
    protected $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function find()
    {
        try {
            return $this->settingRepository->findFirst();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function update($data)
    {
        try {
            $building = $this->settingRepository->findFirst();

            if (isset($data['foto'])) {
                if ($building->foto && Storage::disk('public')->exists($building->foto)) {
                    Storage::disk('public')->delete($building->foto);
                }

                $originalExtension = $data['foto']->getClientOriginalExtension();
                $uniqueFileName = uniqid() . '.' . $originalExtension;
                $filePath = $data['foto']->storeAs('foto-kades', $uniqueFileName, 'public');

                $data['foto'] = $filePath;
            } else {
                $data['foto'] = $building->foto;
            }

            if (isset($data['logo'])) {
                if ($building->logo && Storage::disk('public')->exists($building->logo)) {
                    Storage::disk('public')->delete($building->logo);
                }

                $originalExtension = $data['logo']->getClientOriginalExtension();
                $uniqueFileName = uniqid() . '.' . $originalExtension;
                $filePath = $data['logo']->storeAs('logo', $uniqueFileName, 'public');

                $data['logo'] = $filePath;
            } else {
                $data['logo'] = $building->logo;
            }

            $this->settingRepository->update($data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
