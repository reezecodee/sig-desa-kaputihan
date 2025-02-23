<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LocationRequest;
use App\Services\LocationService;
use Inertia\Inertia;
use Yajra\DataTables\Facades\DataTables;

class LocationController extends Controller
{
    protected $locationService;

    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    public function store(LocationRequest $request)
    {
        try {
            $this->locationService->store($request->validated());

            session()->flash('success', 'Berhasil menambahkan lokasi baru baru');
            return Inertia::location(route('admin.dashboard'));
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(route('admin.dashboard'));
        }
    }

    public function getLocations($type)
    {

        $locations = $this->locationService->getlocations();

        if ($type === 'map') {
            return $locations;
        } else {
            return DataTables::of($locations)
                ->addIndexColumn()
                ->addColumn('warna', function ($row) {
                    if ($row->warna === 'red') {
                        return 'Merah';
                    } else if ($row->warna === 'yellow') {
                        return 'Kuning';
                    } else if ($row->warna === 'green') {
                        return 'Hijau';
                    } else {
                        return 'Biru';
                    }
                })
                ->addColumn('koordinat', function ($row) {
                    return "{$row->latitude}, {$row->longitude}";
                })
                ->addColumn('action', function ($row) {
                    return '
                <a href="' . $row->link . '" target="_blank">
                <button class="shadcn-btn detail-btn">Lihat</button>
                </a>
                <button class="shadcn-btn delete-btn" data-id="' . $row->id . '">Hapus</button>
            ';
                })
                ->rawColumns(['action'])
                ->make(true);
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
