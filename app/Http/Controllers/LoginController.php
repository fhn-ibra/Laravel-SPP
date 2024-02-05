<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function indexpetugas()
    {
        return view('auth.login_petugas');
    }

    public function indexsiswa()
    {
        return view('auth.login_siswa');
    }

    public function prosespetugas(Request $request)
    {

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->level == "admin") {
                return redirect()->route('dashboard');
            } elseif (Auth::user()->level == 'petugas') {
                return redirect()->route('dashboard2');
            }
        }
        return redirect()->route('login-petugas')->with('error', 'Data yang dimasukkan salah!');
    }

    public function prosessiswa(Request $request)
    {

        $credentials = $request->validate([
            'nisn' => ['required'],
            'nama' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // return redirect()->route('riwayat');
        }
        return redirect()->route('login')->with('error', 'Data yang dimasukkan salah!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
