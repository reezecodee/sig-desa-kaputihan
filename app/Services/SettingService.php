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

            if (isset($data['organisasi'])) {
                if ($building->organisasi && Storage::disk('public')->exists($building->organisasi)) {
                    Storage::disk('public')->delete($building->organisasi);
                }

                $originalExtension = $data['organisasi']->getClientOriginalExtension();
                $uniqueFileName = uniqid() . '.' . $originalExtension;
                $filePath = $data['organisasi']->storeAs('organisasi', $uniqueFileName, 'public');

                $data['organisasi'] = $filePath;
            } else {
                $data['organisasi'] = $building->organisasi;
            }

            if (isset($data['favicon'])) {
                $publicPath = public_path('favicon.ico');
                
                if (file_exists($publicPath)) {
                    unlink($publicPath);
                }
                $data['favicon']->move(public_path(), 'favicon.ico');

                unset($data['favicon']);
            }

            $this->settingRepository->update($data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
