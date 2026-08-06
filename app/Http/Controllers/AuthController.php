<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $rules = [
            'login_id' => 'required',
            'password' => 'required'
        ];

        if (str_contains($request->login_id, '@')) {
            $rules['login_id'] = 'required|email';
        }

        $request->validate($rules, [
            'login_id.email' => 'Format email yang Anda masukkan tidak valid.',
        ]);

        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'no_hp';

        $user = User::where($fieldType, $request->login_id)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $request->session()->regenerate();

            // Cukup gunakan 1 Auth bawaan (web guard), tidak perlu Auth::guard('admin')
            Auth::login($user);

            // Arahkan berdasarkan jenis akun (Role)
            if ($user->is_admin) {
                return redirect()->intended('/admin'); // Admin nyasar akan dilempar ke Dashboard
            } else {
                return redirect()->intended('/'); // Masyarakat dilempar ke Beranda Utama
            }
        }

        return back()->withErrors([
            'login_id' => 'Kredensial yang Anda masukkan salah.',
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
            'email' => 'required|email:rfc,dns|unique:users,email',
            'no_hp' => [
                'required',
                'string',
                'min:10',
                'max:13',
                'unique:users,no_hp',
                'regex:/^08[0-9]{8,11}$/',
                function ($attribute, $value, $fail) {
                    if (preg_match('/(.)\1{5,}/', $value)) {
                        $fail('Nomor HP tidak valid. Tolong masukkan nomor asli Anda.');
                    }
                },
            ],
            'alamat' => 'required|string',
            'password' => 'required|min:8|confirmed',
        ], [
            'password.confirmed' => 'Konfirmasi password tidak cocok dengan password yang dimasukkan.',
            'password.min' => 'Password minimal harus 8 karakter.',
            'email.email' => 'Pastikan Anda memasukkan format email yang benar.',
            'no_hp.regex' => 'Nomor HP harus diawali dengan angka 08.',
            'no_hp.min' => 'Nomor HP terlalu pendek (minimal 10 angka).',
            'no_hp.max' => 'Nomor HP terlalu panjang (maksimal 13 angka).',
            'no_hp.unique' => 'Nomor HP ini sudah terdaftar sebelumnya.',
        ]);

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ]);

        // Event ini akan otomatis mengirim email verifikasi ke email user!
        event(new Registered($user));

        Auth::guard('web')->login($user);

        // Setelah daftar, arahkan ke halaman pemberitahuan "Cek Email Anda"
        return redirect()->route('verification.notice');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->regenerate();
        return redirect('/login');
    }
}
