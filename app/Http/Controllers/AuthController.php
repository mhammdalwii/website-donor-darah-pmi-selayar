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
        // Ubah validasi menangkap input 'login_id' (bisa email/no_hp)
        $request->validate([
            'login_id' => 'required',
            'password' => 'required'
        ]);

        // CEK OTOMATIS: Apakah input berupa format email? Jika ya, gunakan kolom 'email', jika tidak, gunakan 'no_hp'
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'no_hp';

        // Lakukan percobaan login
        if (Auth::attempt([$fieldType => $request->login_id, 'password' => $request->password])) {
            $request->session()->regenerate();

            // Jika dia admin, bisa langsung diarahkan ke /admin (opsional), atau biarkan ke home
            return redirect()->intended('/');
        }

        // Jika gagal login
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
