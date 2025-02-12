<?php

namespace App\Repositories;

use App\Models\Blog;

class BlogRepository
{
    public function store($data)
    {
        try {
            return Blog::create($data);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menambahkan data: ' . $e->getMessage());
        }
    }
}
