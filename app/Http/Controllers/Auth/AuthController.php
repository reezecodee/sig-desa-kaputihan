<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login()
    {
        $title = 'Login ke Dalam Aplikasi';

        return Inertia::render('Auth/Login', compact('title'));
    }

    public function loginHandler(LoginRequest $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'telepon';

        if (Auth::attempt([$fieldType => $login, 'password' => $password])) {
            session()->regenerate();
            session()->flash('success', 'Selamat datang di Sistem Informasi Desa Kaputihan');

            return Inertia::location(route('admin.dashboard'));
        }

        return back()->withErrors([
            'login' => 'Email/Telepon atau password salah'
        ]);
    }
}
