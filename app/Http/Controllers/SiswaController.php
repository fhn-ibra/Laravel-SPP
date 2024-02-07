<?php

namespace App\Http\Controllers;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    
    public function index($id){
        return view('siswa', [
            'data' => Pembayaran::where('nisn', $id)->get()
        ]);
    }
}
