<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Http\Requests\Admin\VillageProfileRequest;
use App\Models\VillageProfile;
use App\Services\SettingService;
use Inertia\Inertia;

class SettingController extends Controller
{
    protected $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function index()
    {
        $title = 'Pengaturan Desa';
        $setting = $this->settingService->find();
        $village = VillageProfile::first();

        return Inertia::render('Admin/Setting/Index', compact('title', 'setting', 'village'));
    }

    public function updateSetting(SettingRequest $request)
    {
        try {
            $this->settingService->updateSetting($request->validated());

            session()->flash('success', 'Pengaturan berhasil diperbarui.');
            return Inertia::location(route('admin.setting'));
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(route('admin.setting'));
        }
    }

    public function updateVillageProfile(VillageProfileRequest $request)
    {
        try {
            $this->settingService->updateVillageProfile($request->validated());

            session()->flash('success', 'Profile desa berhasil diperbarui.');
            return Inertia::location(route('admin.setting'));
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(route('admin.setting'));
        }
    }
}
