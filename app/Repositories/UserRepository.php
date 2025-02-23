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
            throw new \Exception('Terjadi kesalahan saat mencoba menambahkan data');
        }
    }

    public function update($data, $id)
    {
        try {
            $user = User::findOrFail($id);
            
            return $user->update($data);
        } catch (\Exception $e) {
            throw new \Exception('Terjadi kesalahan saat mencoba memperbarui data');
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            return $user->delete();
        } catch (\Exception $e) {
            throw new \Exception('Terjadi kesalahan saat mencoba menghapus data');
        }
    }
}
