<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['nim' => $request->nim, 'password' => $request->password])) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('mahasiswa.kkn');
        }

        return back()->withErrors(['nim' => 'NIM atau password salah.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('status', 'Kamu telah keluar dari akun');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:users,nim',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:admin,mahasiswa',
        ]);

        User::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silahkan login disini');
    }
}
