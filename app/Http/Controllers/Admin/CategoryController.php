<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
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
        $survey = Category::findOrFail($id);
        $survey->delete();

        session()->flash('success', 'Berhasil menghapus kategori bangunan');
        return Inertia::location(back());
    }
}
