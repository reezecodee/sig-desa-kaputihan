<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChangePasswordRequest;
use App\Http\Requests\Admin\EditProfileRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function index()
    {
        $title = 'Profile';

        return Inertia::render('Admin/Profile/Index', compact('title'));
    }

    public function editProfile(EditProfileRequest $request)
    {
        
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        
    }
}
