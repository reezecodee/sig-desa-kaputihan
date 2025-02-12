<?php

namespace App\Services;

use App\Repositories\BlogRepository;
use Illuminate\Support\Str;

class BlogService
{
    protected $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function store($data)
    {
        try {
            // Buat slug
            $data['slug'] = Str::slug($data['judul']);

            $originalExtension = $data['thumbnail']->getClientOriginalExtension();
            $uniqueFileName = uniqid() . '.' . $originalExtension;
            $filePath = $data['thumbnail']->storeAs('thumbnail', $uniqueFileName, 'public');
            $data['thumbnail'] = $filePath;

            return $this->blogRepository->store($data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
