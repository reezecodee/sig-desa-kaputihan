<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Building;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $title = 'Kategori Bangunan';

        return Inertia::render('Admin/Category/Index', compact('title'));
    }

    public function store(CategoryRequest $request)
    {
        try {
            $this->categoryService->store($request->validated());

            session()->flash('success', 'Berhasil menambahkan kategori bangunan baru');
            return Inertia::location(back());
        } catch (\Exception $e) {
            session()->flash('failed', 'Terjadi kesalahan. Data gagal disimpan.');
            return Inertia::location(back());
        }
    }

    public function edit($id)
    {
        $title = 'Edit Kategori Bangunan';
        $category = $this->categoryService->find($id);

        return Inertia::render('Admin/Category/Edit', compact('title', 'category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        try {
            $this->categoryService->update($request->validated(), $id);

            session()->flash('success', 'Berhasil memperbarui kategori bangunan.');
            return Inertia::location(back());
        } catch (\Exception $e) {
            session()->flash('failed', 'Terjadi kesalahan. Data gagal disimpan.');
            return Inertia::location(back());
        }
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $buildings = Building::with('buildingPhotos')->where('kategori_id', $id)->get();

        foreach ($buildings as $building) {

            foreach ($building->buildingPhotos as $photo) {
                $galleryPhotoPath = "foto-bangunan/{$photo->nama_file}";
                if (Storage::disk('public')->exists($galleryPhotoPath)) {
                    Storage::disk('public')->delete($galleryPhotoPath);
                }
                $photo->delete();
            }

            $mainPhotoPath = "foto-bangunan/{$building->foto_bangunan}";
            if ($building->foto_bangunan && Storage::disk('public')->exists($mainPhotoPath)) {
                Storage::disk('public')->delete($mainPhotoPath);
            }

            $building->delete();
        }

        $category->delete();

        session()->flash('success', 'Berhasil menghapus kategori beserta semua bangunannya');
        return Inertia::location(back());
    }
}
