<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            return redirect()->intended('home');
        }
        return view('login.view_login');
    }

    public function registerForm()
    {
        return view('login.view_register');
    }

    public function proses(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],
        [
            'username.required' =>  'Username tidak boleh kosong',
            'password.required' =>  'Password tidak boleh kosong',
        ]
        );

        $user = \App\Models\User::where('username', $request->input('username'))->first();

        if ($user && $this->zigzagDecrypt($user->password, 3) === $request->input('password')) {
            // Login berhasil
            Auth::login($user);

            $request->session()->flash('success', 'Login berhasil.');
            return redirect()->intended('home');
        } else {
            // Login gagal
            return back()->withErrors([
                'username' => 'Maaf username atau password anda salah',
            ])->onlyInput('username');
        }
    }

    private function zigzagDecrypt($text, $depth)
    {
        $result = str_repeat(' ', strlen($text));
        $index = 0;

        for ($row = 0; $row < $depth; $row++) {
            $i = $row;

            while ($i < strlen($text)) {
                $result[$i] = $text[$index++];
                $i += 2 * ($depth - 1);

                if ($row > 0 && $row < $depth - 1 && $i - 2 * $row < strlen($text)) {
                    $result[$i - 2 * $row] = $text[$index++];
                }
            }
        }

        return $result;
    }

    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ],
        [
            'name.required' => 'Nama tidak boleh kosong',
            'username.required' => 'Username tidak boleh kosong',
            'username.unique' => 'Username sudah digunakan, pilih username lain',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah digunakan, pilih email lain',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal harus 6 karakter',
        ]);

        // Membuat user baru
        $user = \App\Models\User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $this->zigzagEncrypt($request->input('password'), 3), // Ganti 3 dengan depth yang sesuai
            'level' => $request->input('level'),
        ]);

        // Login user yang baru dibuat
        // Auth::login($user);

        $request->session()->flash('success', 'Registrasi berhasil. Silakan login.');

        // Redirect ke halaman login setelah registrasi
        return redirect()->route('login');
    }

    private function zigzagEncrypt($text, $depth)
    {
        $result = "";

        for ($row = 0; $row < $depth; $row++) {
            $i = $row;

            while ($i < strlen($text)) {
                $result .= $text[$i];
                $i += 2 * ($depth - 1);

                if ($row > 0 && $row < $depth - 1 && $i - 2 * $row < strlen($text)) {
                    $result .= $text[$i - 2 * $row];
                }
            }
        }

        return $result;
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

}
