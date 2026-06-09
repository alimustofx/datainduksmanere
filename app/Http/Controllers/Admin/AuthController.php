<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman Form Login
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    // Memproses data inputan Login
    public function login(Request $request)
    {
        $kredensial = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
        ]);

        // Gunakan guard 'admin' yang sudah kita daftarkan di config/auth.php
        if (Auth::guard('admin')->attempt($kredensial, $request->remember)) {
            $request->session()->regenerate();

            // Alihkan ke dashboard admin jika sukses
            return redirect()->intended(route('admin.dashboard'));
        }

        // Jika gagal, kembalikan dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau password yang Anda masukkan salah.',
        ])->onlyInput('username');
    }

    // Proses Logout Admin
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}