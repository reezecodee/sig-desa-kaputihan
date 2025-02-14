<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChangePasswordRequest;
use App\Http\Requests\Admin\EditProfileRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $validated = $request->validated();

        if (!Hash::check($validated['current_password'], Auth::user()->password)) {
            return back()->withErrors([
                'current_password' => 'Password saat ini tidak valid'
            ]);
        }

        // Update password baru
        $user = Auth::user();
        $user->password = Hash::make($validated['new_password']);
        $user->save();

        session()->flash('success', 'Barhasil memperbarui password');
        return Inertia::location(route('admin.profile'));
    }
}
