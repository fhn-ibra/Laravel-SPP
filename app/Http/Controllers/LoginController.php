<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function petugas(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->level == 'admin') {
                return redirect()->route('/admin');
            } elseif (Auth::user()->level == 'petugas') {
                return redirect()->route('dashboard-guru');
            }
 
            return redirect()->intended('/dashboard');
        }
    }

}
