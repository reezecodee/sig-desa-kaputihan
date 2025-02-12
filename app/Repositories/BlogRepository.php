<?php

namespace App\Repositories;

use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogRepository
{
    public function find($id)
    {
        return Blog::findOrFail($id);
    }

    public function lists()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();

        return $blogs;
    }

    public function store($data)
    {
        try {
            return Blog::create($data);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menambahkan data: ' . $e->getMessage());
        }
    }

    public function update($data, $id)
    {
        try {
            $blog = Blog::findOrFail($id);
            
            return $blog->update($data);
        } catch (\Exception $e) {
            throw new \Exception('Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $blog = Blog::findOrFail($id);

            if ($blog->thumbnail && Storage::disk('public')->exists($blog->thumbnail)) {
                Storage::disk('public')->delete($blog->thumbnail);
            }

            return $blog->delete();
        } catch (\Exception $e) {
            throw new \Exception('Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
