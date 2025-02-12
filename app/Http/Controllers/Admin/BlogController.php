<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Services\BlogService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index()
    {
        $title = 'Daftar Blog';

        return Inertia::render('Admin/Blog/Index', compact('title'));
    }

    public function getBlogs(Request $request)
    {
        $data = collect([
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

    public function create()
    {
        $title = 'Buat Blog Baru';

        return Inertia::render('Admin/Blog/Create', compact('title'));
    }

    public function store(BlogRequest $request)
    {
        try {
            $this->blogService->store($request->validated());

            session()->flash('success', 'Blog berhasil disimpan.');
            return Inertia::location(route('admin.blog'));
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(route('admin.blogCreate'));
        }
    }

    public function edit()
    {
        $title = 'Edit Blog';

        return Inertia::render('Admin/Blog/Edit', compact('title'));
    }
}
