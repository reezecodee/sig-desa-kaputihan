<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChangePasswordRequest;
use App\Http\Requests\Admin\EditProfileRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProfileController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $title = 'Profile';

        return Inertia::render('Admin/Profile/Index', compact('title'));
    }

    public function editProfile(EditProfileRequest $request)
    {
        $id = Auth::user()->id;
        
        try {
            $this->userService->update($request->validated(), $id);

            session()->flash('success', 'Berhasil memperbarui profile.');
            return Inertia::location(route('admin.profile'));
        } catch (\Exception $e) {
            session()->flash('failed', $e->getMessage());
            return Inertia::location(route('admin.profile'));
        }
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        
    }
}
