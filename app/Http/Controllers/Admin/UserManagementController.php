<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Services\UserService;
use Inertia\Inertia;

class UserManagementController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        $title = 'Manajemen Pengguna';

        return Inertia::render('Admin/UserManagement/Index', compact('title'));
    }

    public function create()
    {
        $title = 'Tambah Pengguna Baru';

        return Inertia::render('Admin/UserManagement/Create', compact('title'));
    }

    public function store(UserRequest $request)
    {
        try {
            $this->userService->store($request->validated());

            session()->flash('success', 'Pengguna Baru Berhasil di Tambahkan');
            return redirect()->route('admin.userManagement');
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(route('admin.userCreate'));
        }
    }

    public function edit($id)
    {
        $title = 'Edit Pengguna';
        $user = $this->userService->find($id);

        return Inertia::render('Admin/UserManagement/Edit', compact('title', 'user'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $this->userService->update($request->validated(), $id);

            session()->flash('success', 'Pengguna berhasil diperbarui.');
            return Inertia::location(route('admin.userEdit', $id));
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(route('admin.userEdit', $id));
        }
    }

    public function destroy($id)
    {
        try {
            $this->userService->delete($id);

            session()->flash('success', 'Berhasil menghapus data pengguna');
            return Inertia::location(route('admin.userManagement'));
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(route('admin.userManagement'));
        }
    }
}
