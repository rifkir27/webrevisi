<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:guru,siswa'
        ]);

        $guard = $credentials['role'];
        unset($credentials['role']);

        if (Auth::guard($guard)->attempt($credentials)) {
            $request->session()->regenerate();
            
            return redirect()->intended($guard === 'guru' ? '/guru/dashboard' : '/siswa/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:gurus|unique:siswas',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:guru,siswa',
        ]);

        if ($request->role === 'guru') {
            Guru::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } else {
            $request->validate([
                'nis' => 'required|unique:siswas',
                'kelas' => 'required',
            ]);

            Siswa::create([
                'nis' => $request->nis,
                'nama' => $request->nama,
                'kelas' => $request->kelas,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}