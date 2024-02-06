<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('petugas.dashboard', ['title' => 'Dashboard']);
    }

    public function index_siswa(){
        return view('petugas.admin.siswa', [
            'title' => 'Siswa',
            'data' => Siswa::all()
        ]);
    }

    public function index_kelas(){
        return view('petugas.admin.kelas', [
            'title' => 'Kelas',
            'data' => Kelas::all()
        ]);
    }

    public function save_kelas(Request $request){
        $validasi = $request->validate([
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required'
        ]);

        $kelas = new Kelas();
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->kompetensi_keahlian = $request->kompetensi_keahlian;
        $kelas->save();

        return redirect()->route('kelas');
    }

    public function delete_kelas(Request $request){
        $data = $request->id_kelas;
        $akun = Kelas::where('id_kelas', $data)->get();
        $akun->delete();
        return redirect()->route('kelas');
    }

}
