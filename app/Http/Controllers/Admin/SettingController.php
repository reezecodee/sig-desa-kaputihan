<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Services\SettingService;
use Illuminate\Http\Request;
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
        $village = $this->settingService->find();

        return Inertia::render('Admin/Setting/Index', compact('title', 'village'));
    }

    public function update(SettingRequest $request)
    {
        try {
            $this->settingService->update($request->validated());

            session()->flash('success', 'Pengaturan berhasil diperbarui.');
            return Inertia::location(route('admin.setting'));
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(route('admin.setting'));
        }
    }
}
