<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
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

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
           
        }
        return redirect()->route('login-petugas')->with('error', 'Data yang dimasukkan salah!');
    } 

    public function prosessiswa(Request $request)
    {
    
        $credentials = $request->only('nisn', 'nama');
        $siswa = Siswa::authenticate($credentials['nisn'], $credentials['nama']);

        if ($siswa) {
            Auth::login($siswa);
            return redirect()->intended('/siswa-index/'. Auth::user()->nisn);
        }
        return redirect()->route('login')->with('error', 'Data yang dimasukkan salah!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
