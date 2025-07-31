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
        $login = $request->login;
        $password = $request->password;

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'telepon';
        $credentials = [$fieldType => $login, 'password' => $password];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (is_null(Auth::user()->email_verified_at)) {
                Auth::user()->update(['email_verified_at' => now()]);
            }
            
            session()->flash('success', 'Selamat datang di Sistem Informasi Geografis Desa Kaputihan');

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'login' => 'Email/Telepon atau password salah'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        return Inertia::location(route('landing.home'));
    }
}
