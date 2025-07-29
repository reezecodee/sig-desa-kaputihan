<?php

namespace App\Http\Controllers\Datatable;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryDatatableController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getCategories()
    {
        $categories = $this->categoryService->getCategories();

        return DataTables::of($categories)
            ->addIndexColumn()
            ->addColumn('icon', function ($row) {
                return '<div class="text-green-icon text-lg">'. $row->icon . '</div>';
            })
            ->addColumn('action', function ($row) {
                return '
                <div class="flex flex-wrap gap-1">
                <a href="' . '' . '">
                <button class="shadcn-btn detail-btn">Lihat</button>
                </a>
                <button class="shadcn-btn edit-btn" data-id="' . $row->id . '">Edit</button>
                <button class="shadcn-btn delete-btn" data-id="' . $row->id . '">Hapus</button>
                </div>
            ';
            })
            ->rawColumns(['icon', 'action'])
            ->make(true);
    }
}
