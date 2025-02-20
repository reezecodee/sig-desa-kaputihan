<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;
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

    public function getBlogs()
    {
        $blogs = $this->blogService->getBlogs();

        return DataTables::of($blogs)
            ->addIndexColumn()
            ->addColumn('judul', function ($row) {
                return $row->judul;
            })
            ->addColumn('created_at', function ($row) {
                return \Carbon\Carbon::parse($row->created_at)->translatedFormat('d F Y');;
            })
            ->addColumn('action', function ($row) {
                return '
                <button class="shadcn-btn edit-btn" data-id="' . $row->id . '">Edit</button>
                <button class="shadcn-btn delete-btn" data-id="' . $row->id . '">Hapus</button>
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

    public function edit($id)
    {
        $title = 'Edit Blog';
        $blog = $this->blogService->find($id);

        return Inertia::render('Admin/Blog/Edit', compact('title', 'blog'));
    }

    public function update(UpdateBlogRequest $request, $id)
    {
        try {
            $this->blogService->update($request->validated(), $id);

            session()->flash('success', 'Blog berhasil diperbarui.');
            return Inertia::location(route('admin.blogEdit', $id));
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(route('admin.blogCreate'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->blogService->delete($id);

            session()->flash('success', 'Berhasil menghapus data blog');
            return Inertia::location(route('admin.blog'));
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(route('admin.blog'));
        }
    }
}
