<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LocationRequest;
use App\Services\LocationService;
use Inertia\Inertia;

class LocationController extends Controller
{
    protected $locationService;

    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    public function getLocations()
    {

        $locations = $this->locationService->getlocations();

        return $locations;
    }

    public function store(LocationRequest $request)
    {
        try {
            $this->locationService->store($request->validated());

            session()->flash('success', 'Berhasil menambahkan lokasi baru.');
            return Inertia::location(route('admin.dashboard'));
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(route('admin.dashboard'));
        }
    }

    public function locationsMap()
    {
        $data = $this->locationService->getLocations();

        return response()->json($data);
    }

    public function destroy($id)
    {
        try {
            $this->locationService->delete($id);

            session()->flash('success', 'Berhasil menghapus lokasi');
            return Inertia::location(route('admin.dashboard'));
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(route('admin.dashboard'));
        }
    }
}
