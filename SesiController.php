<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller {
    public function index() {
        return view('login');
    }


    public function login(Request $request) {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Mencoba autentikasi pengguna
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Jika berhasil, ambil pengguna yang terautentikasi
            $user = Auth::user();

            // Redirect berdasarkan peran pengguna
            if ($user->role === 'admin') {
                return view('home-admin'); // Tampilkan halaman admin
            } elseif ($user->role === 'operator') {
                return view('home-operator'); // Tampilkan halaman operator
            }
        }

        // Jika gagal, kembali ke halaman login dengan pesan kesalahan
        return redirect()->back()->withErrors('Username atau Password salah!')->withInput();
    }
}
