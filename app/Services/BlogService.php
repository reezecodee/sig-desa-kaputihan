<?php

namespace App\Services;

use App\Repositories\BlogRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogService
{
    protected $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function find($id)
    {
        return $this->blogRepository->find($id);
    }

    public function getBlogs()
    {
        return $this->blogRepository->lists();
    }

    public function store($data)
    {
        try {
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

    public function update($data, $id)
    {
        try {
            $data['slug'] = Str::slug($data['judul']);
            $blog = $this->blogRepository->find($id);

            if (isset($data['thumbnail'])) {
                if ($blog->thumbnail && Storage::disk('public')->exists($blog->thumbnail)) {
                    Storage::disk('public')->delete($blog->thumbnail);
                }

                $originalExtension = $data['thumbnail']->getClientOriginalExtension();
                $uniqueFileName = uniqid() . '.' . $originalExtension;
                $filePath = $data['thumbnail']->storeAs('thumbnail', $uniqueFileName, 'public');

                $data['thumbnail'] = $filePath;
            } 
            else {
                $data['thumbnail'] = $blog->thumbnail;
            }

            $this->blogRepository->update($data, $id);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }


    public function delete($id)
    {
        try {
            return $this->blogRepository->destroy($id);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
