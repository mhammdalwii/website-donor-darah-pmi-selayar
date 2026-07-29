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

        // Cari user manual dari database
        $user = User::where($fieldType, $request->login_id)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $request->session()->regenerate();

            if ($user->is_admin) {
                Auth::guard('admin')->login($user);
                Auth::guard('web')->login($user);
                return redirect()->intended('/admin');
            } else {
                // JALUR UMUM: Hanya login ke Portal (web)
                Auth::guard('web')->login($user);
                return redirect()->intended('/');
            }
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

        // Langsung login ke jalur umum setelah daftar
        Auth::guard('web')->login($user);

        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->regenerate();

        return redirect('/login');
    }
}
