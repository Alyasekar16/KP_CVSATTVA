<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        // Mengembalikan view 'auth.login'
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // 1. Validasi input form
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        // 2. Attempt Login: Mencocokkan kredensial dengan database
        if (Auth::attempt($credentials)) {
            // 3. Regenerasi Session (untuk keamanan)
            $request->session()->regenerate();
            // 4. Redirect ke URL yang dimaksud sebelumnya, atau ke halaman default (named route 'admin.beranda')
            return redirect()->intended(route('admin.beranda'));
        }

        // 5. Jika attempt gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password yang dimasukkan salah.',
        ]);
    }

    public function logout(Request $request)
    {
        // 1. Logout user (menghapus session auth)
        Auth::logout();
        // 2. Invalidasi session saat ini
        $request->session()->invalidate();
        // 3. Regenerasi CSRF token (untuk keamanan)
        $request->session()->regenerateToken();
        // 4. Redirect ke halaman login
        return redirect('/login');
    }
}
