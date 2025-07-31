<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BuildingRequest;
use App\Services\BuildingService;
use Inertia\Inertia;
use Yajra\DataTables\Facades\DataTables;

class BuildingController extends Controller
{
    protected $buildingService;

    public function __construct(BuildingService $buildingService)
    {
        $this->buildingService = $buildingService;
    }

    public function index($categoryID)
    {
        $title = 'Bangunan Desa';
        $categoryID = $categoryID;

        return Inertia::render('Admin/Building/Index', compact('title', 'categoryID'));
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
