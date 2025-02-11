<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserManagementController extends Controller
{
    public function index()
    {
        $title = 'Manajemen Pengguna';

        return Inertia::render('Admin/UserManagement/Index', compact('title'));
    }

    public function getUsers()
    {

    }

    public function create()
    {
        $title = 'Tambah Pengguna Baru';

        return Inertia::render('Admin/UserManagement/Create', compact('title'));
    }

    public function store()
    {

    }

    public function edit()
    {
        $title = 'Edit Pengguna';

        return Inertia::render('Admin/UserManagement/Edit', compact('title'));
    }

    public function update()
    {
        
    }

    public function destroy()
    {
        
    }
}
