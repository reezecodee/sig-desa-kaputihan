<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BuildingImageRequest;
use App\Http\Requests\Admin\BuildingRequest;
use App\Models\BuildingPhoto;
use App\Services\BuildingService;
use App\Services\CategoryService;
use Inertia\Inertia;

class BuildingController extends Controller
{
    protected $buildingService;
    protected $categoryService;

    public function __construct(BuildingService $buildingService, CategoryService $categoryService)
    {
        $this->buildingService = $buildingService;
        $this->categoryService = $categoryService;
    }

    public function index($categoryID)
    {
        $category =  $this->categoryService->find($categoryID);
        $title = "Bangunan Desa: {$category->nama_kategori}";

        return Inertia::render('Admin/Building/Index', compact('title', 'categoryID'));
    }

    public function create($categoryID)
    {
        $title = 'Tambah Bangunan Umum';

        return Inertia::render('Admin/Building/Create', compact('title', 'categoryID'));
    }

    public function store(BuildingRequest $request, $categoryID)
    {
        try {
            $this->buildingService->store($request->validated());

            session()->flash('success', 'Data bangunan berhasil ditambahkan.');
            return Inertia::location(route('admin.building', $categoryID));
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(back());
        }
    }

    public function edit($buildingID)
    {
        $title = 'Edit Bangunan';
        $building = $this->buildingService->find($buildingID);
        $categories = $this->categoryService->getCategories()->get();
        $buildingPhotos = $this->buildingService->getBuildingPhotos($buildingID);

        return Inertia::render('Admin/Building/Edit', compact('title', 'building', 'categories', 'buildingPhotos'));
    }

    public function update(BuildingRequest $request, $buildingID)
    {
        try {
            $this->buildingService->update($request->validated(), $buildingID);

            session()->flash('success', 'Data bangunan berhasil diperbarui.');
            return Inertia::location(back());
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(back());
        }
    }

    public function destroy($buildingID)
    {
        try {
            $this->buildingService->delete($buildingID);

            session()->flash('success', 'Berhasil menghapus data bangunan');
            return Inertia::location(back());
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(back());
        }
    }

    public function storeBuildingImages(BuildingImageRequest $request, $buildingID)
    {
        $newPhotos = [];
        $path = 'foto-bangunan';

        foreach ($request->file('images') as $file) {
            $fileName = uniqid() . $file->getClientOriginalExtension();

            $file->storeAs($path, $fileName, 'public');

            $newPhoto = BuildingPhoto::create([
                'bangunan_id' => $buildingID,
                'nama_file' => $fileName,
            ]);

            $newPhotos[] = $newPhoto;
        }

        session()->flash('success', 'Berhasil menambahkan gambar ke gallery');
        return Inertia::location(back());
    }

    public function destroyBuildingImages($photoID)
    {
        try {
            $this->buildingService->deleteBuildingImages($photoID);

            session()->flash('success', 'Berhasil menghapus data bangunan');
            return Inertia::location(back());
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(back());
        }
    }
}
