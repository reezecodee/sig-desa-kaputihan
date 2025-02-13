<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function find($id)
    {
        return $this->userRepository->find($id);
    }

    public function getUsers()
    {
        return $this->userRepository->lists();
    }

    public function store($data)
    {
        try {
            $data['password'] = bcrypt('12345678');
            return $this->userRepository->store($data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function update($data, $id)
    {
        try {
            $this->userRepository->update($data, $id);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function delete($id)
    {
        return $this->userRepository->destroy($id);
    }
}
