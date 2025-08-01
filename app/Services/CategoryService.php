<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function find($id)
    {
        return $this->categoryRepository->findCategory($id);
    }

    public function store($data)
    {
        return $this->categoryRepository->storeCategory($data);
    }

    public function update($data, $id)
    {
        return $this->categoryRepository->updateCategory($data, $id);
    }

    public function getCategories()
    {
        return $this->categoryRepository->categories();
    }
}
