<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login_id' => 'required',
            'password' => 'required'
        ]);

        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'no_hp';

        if (Auth::attempt([$fieldType => $request->login_id, 'password' => $request->password])) {
            $request->session()->regenerate();

            // CEK OTOMATIS: Jika yang login adalah Admin, lempar ke dashboard Filament
            if (Auth::user()->is_admin) {
                return redirect()->intended('/admin');
            }

            // Jika yang login adalah masyarakat biasa, lempar ke beranda
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'login_id' => 'Email / Nomor HP atau Password yang Anda masukkan salah.',
        ]);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Tambahkan validasi email
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required|string|max:20|unique:users,no_hp',
            'alamat' => 'required|string',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ]);

        // Langsung login setelah register berhasil
        Auth::login($user);

        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
