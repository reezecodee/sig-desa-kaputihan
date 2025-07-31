<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;
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

    public function edit($id)
    {
        $title = 'Edit Kategori Bangunan';
        $category = $this->categoryService->find($id);

        return Inertia::render('Admin/Category/Edit', compact('title', 'category'));
    }

    public function update($id)
    {
        $title = 'Edit Kategori Bangunan';

        return Inertia::render('Admin/Category/Edit', compact('title'));
    }
}
