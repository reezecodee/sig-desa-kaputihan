<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Inertia\Inertia;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    public function index()
    {
        $title = 'Blog';

        return Inertia::render('Admin/Blog/Index', compact('title'));
    }

    public function getBlogs(Request $request)
    {
        $data = collect([
            [
                'id' => '12312',
                'judul' => 'Ambatukam makan mie gorengs',
                'visibilitas' => 'Publik',
                'updated_at' => '2025-05-25'
            ],
            [
                'id' => '31231',
                'judul' => 'Ambatukam makan mie goreng',
                'visibilitas' => 'Publik',
                'updated_at' => '2025-05-25'
            ],
            [
                'id' => '31231',
                'judul' => 'Ambatukam makan mie goreng',
                'visibilitas' => 'Publik',
                'updated_at' => '2025-05-25'
            ],
            [
                'id' => '31231',
                'judul' => 'Ambatukam makan mie goreng',
                'visibilitas' => 'Publik',
                'updated_at' => '2025-05-25'
            ],
            [
                'id' => '31231',
                'judul' => 'Ambatukam makan mie goreng',
                'visibilitas' => 'Publik',
                'updated_at' => '2025-05-25'
            ],
            [
                'id' => '31231',
                'judul' => 'Ambatukam makan mie goreng',
                'visibilitas' => 'Publik',
                'updated_at' => '2025-05-25'
            ],
            [
                'id' => '31231',
                'judul' => 'Ambatukam makan mie goreng',
                'visibilitas' => 'Publik',
                'updated_at' => '2025-05-25'
            ],
            [
                'id' => '31231',
                'judul' => 'Ambatukam makan mie goreng',
                'visibilitas' => 'Publik',
                'updated_at' => '2025-05-25'
            ],
            [
                'id' => '31231',
                'judul' => 'Ambatukam makan mie goreng',
                'visibilitas' => 'Publik',
                'updated_at' => '2025-05-25'
            ],
            [
                'id' => '31231',
                'judul' => 'Ambatukam makan mie goreng',
                'visibilitas' => 'Publik',
                'updated_at' => '2025-05-25'
            ],
            [
                'id' => '31231',
                'judul' => 'Ambatukam makan mie goreng',
                'visibilitas' => 'Publik',
                'updated_at' => '2025-05-25'
            ],
            [
                'id' => '31231',
                'judul' => 'Ambatukam makan mie goreng',
                'visibilitas' => 'Publik',
                'updated_at' => '2025-05-25'
            ],
            [
                'id' => '31231',
                'judul' => 'Ambatukam makan mie goreng',
                'visibilitas' => 'Publik',
                'updated_at' => '2025-05-25'
            ],
        ]);

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('judul', function ($row) {
                return $row['judul'];
            })
            ->addColumn('action', function ($row) {
                return '
                <button class="shadcn-btn edit-btn" data-id="${row.id}">Edit</button>
                <button class="shadcn-btn delete-btn" data-id="${row.id}">Delete</button>
            ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
