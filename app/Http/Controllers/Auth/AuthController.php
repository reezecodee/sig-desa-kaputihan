<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login()
    {
        $title = 'Login ke Dalam Aplikasi';

        return Inertia::render('Auth/Login', compact('title'));
    }
}
