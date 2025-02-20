<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BuildingRequest;
use App\Services\BuildingService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Yajra\DataTables\Facades\DataTables;

class BuildingController extends Controller
{
    protected $buildingService;

    public function __construct(BuildingService $buildingService)
    {
        $this->buildingService = $buildingService;
    }

    public function index()
    {
        $title = 'Bangunan Umum';

        return Inertia::render('Admin/Building/Index', compact('title'));
    }

    public function getBuildings($category)
    {
        $buildings = $this->buildingService->getBuildings($category);

        return DataTables::of($buildings)
            ->addIndexColumn()
            ->addColumn('foto_bangunan', function ($row) {
                $placeholder = asset('placeholder/blog.svg');
                $imageUrl = $row->foto_bangunan
                    ? asset('storage/' . $row->foto_bangunan)
                    : $placeholder;

                return '<div style="width: 100px; aspect-ratio: 16 / 9; overflow: hidden;">
                            <img src="' . $imageUrl . '" alt="Foto Bangunan" 
                                style="width: 100%; height: 100%; object-fit: cover;">
                        </div>';
            })
            ->addColumn('created_at', function ($row) {
                return \Carbon\Carbon::parse($row->created_at)->translatedFormat('d F Y');
            })
            ->addColumn('action', function ($row) {
                return '
                <a href="'. route('landing.buildingInformation', $row->id) .'">
                <button class="shadcn-btn detail-btn">Lihat</button>
                </a>
                <button class="shadcn-btn edit-btn" data-id="' . $row->id . '">Edit</button>
                <button class="shadcn-btn delete-btn" data-id="' . $row->id . '">Hapus</button>
            ';
            })
            ->rawColumns(['foto_bangunan', 'action'])
            ->make(true);
    }

    public function create()
    {
        $title = 'Tambah Bangunan Umum';

        return Inertia::render('Admin/Building/Create', compact('title'));
    }

    public function store(BuildingRequest $request)
    {
        try {
            $this->buildingService->store($request->validated());

            session()->flash('success', 'Data bangunan berhasil ditambahkan.');
            return Inertia::location(route('admin.building'));
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(route('admin.buildingCreate'));
        }
    }

    public function edit($id)
    {
        $title = 'Edit Bangunan';
        $building = $this->buildingService->find($id);

        return Inertia::render('Admin/Building/Edit', compact('title', 'building'));
    }

    public function update(BuildingRequest $request, $id)
    {
        try {
            $this->buildingService->update($request->validated(), $id);

            session()->flash('success', 'Data bangunan berhasil diperbarui.');
            return Inertia::location(route('admin.buildingEdit', $id));
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(route('admin.buildingEdit', $id));
        }
    }

    public function destroy($id)
    {
        try {
            $this->buildingService->delete($id);

            session()->flash('success', 'Berhasil menghapus data bangunan');
            return Inertia::location(route('admin.building'));
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(route('admin.building'));
        }
    }
}
