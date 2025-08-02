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
            $setting = $this->settingRepository->findFirst();

            if (isset($data['logo'])) {
                if ($setting->logo && Storage::disk('public')->exists($setting->logo)) {
                    Storage::disk('public')->delete($setting->logo);
                }

                $originalExtension = $data['logo']->getClientOriginalExtension();
                $uniqueFileName = uniqid() . '.' . $originalExtension;
                $filePath = $data['logo']->storeAs('logo', $uniqueFileName, 'public');

                $data['logo'] = $filePath;
            } else {
                $data['logo'] = $setting->logo;
            }

            if (isset($data['foto_organisasi'])) {
                if ($setting->foto_organisasi && Storage::disk('public')->exists($setting->foto_organisasi)) {
                    Storage::disk('public')->delete($setting->foto_organisasi);
                }

                $originalExtension = $data['foto_organisasi']->getClientOriginalExtension();
                $uniqueFileName = uniqid() . '.' . $originalExtension;
                $filePath = $data['foto_organisasi']->storeAs('foto_organisasi', $uniqueFileName, 'public');

                $data['foto_organisasi'] = $filePath;
            } else {
                $data['foto_organisasi'] = $setting->foto_organisasi;
            }

            $this->settingRepository->update($data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
