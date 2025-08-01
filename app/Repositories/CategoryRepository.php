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

    public function findCategory($id)
    {
        return Category::findOrFail($id);
    }

    public function storeCategory($data)
    {
        Category::create($data);
    }

    public function updateCategory($data, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($data);
    }
}
