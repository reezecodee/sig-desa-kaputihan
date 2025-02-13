<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function find($id)
    {
        return User::findOrFail($id);
    }

    public function lists()
    {
        $users = User::orderBy('created_at', 'desc')->get();

        return $users;
    }

    public function store($data)
    {
        try {
            return User::create($data);
        } catch (\Exception $e) {
            throw new \Exception('Gagal menambahkan data: ' . $e->getMessage());
        }
    }

    public function update($data, $id)
    {
        try {
            $user = User::findOrFail($id);
            
            return $user->update($data);
        } catch (\Exception $e) {
            throw new \Exception('Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            return $user->delete();
        } catch (\Exception $e) {
            throw new \Exception('Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
