<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function index()
    {
        $title = 'Profile';

        return Inertia::render('Admin/Profile/Index', compact('title'));
    }
}
