<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function categories()
    {
        $attributes = ['id', 'nama_kategori', 'icon', 'deskripsi'];
        $categories = Category::select($attributes)->latest();

        return $categories;
    }
}
