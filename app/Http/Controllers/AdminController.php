<?php

namespace App\Http\Controllers;
use App\Models\Spp;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('petugas.dashboard', ['title' => 'Dashboard']);
    }

    public function index_siswa(){
        return view('petugas.admin.siswa', [
            'title' => 'Siswa',
            'data' => Siswa::all(),
            'kelas' => Kelas::all(),
            'spp' => Spp::all()
        ]);
    }

    public function index_kelas(){
        return view('petugas.admin.kelas', [
            'title' => 'Kelas',
            'data' => Kelas::all(),
        ]);
    }

    public function index_spp(){
        return view('petugas.admin.spp', [
            'title' => 'SPP',
            'data' => Spp::all()
        ]);
    }

    public function index_petugas(){
        return view('petugas.admin.petugas', [
            'title' => 'Petugas',
            'data' => User::all()
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
        $akun = Kelas::where('id_kelas', $request->id_kelas);
        $akun->delete();
        return redirect()->route('kelas');
    }

    public function edit_kelas(Request $request){
        $data = Kelas::where('id_kelas', $request->id_kelas);
        $data->update([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian
        ]);

        return redirect()->route('kelas');
    }

    public function save_spp(Request $request){
        $validasi = $request->validate([
            'tahun' => 'required',
            'nominal' => 'required'
        ]);

        $spp = new Spp();
        $spp->tahun = $request->tahun;
        $spp->nominal = $request->nominal;
        $spp->save();

        return redirect()->route('spp');
    }

    public function delete_spp(Request $request){
        $data = Spp::where('id_spp', $request->id_spp);
        $data->delete();
        return redirect()->route('spp');
    }

    public function edit_spp(Request $request){
        $data = Spp::where('id_spp', $request->id_spp);
        $data->update([
            'tahun' => $request->tahun,
            'nominal' => $request->nominal
        ]);

        return redirect()->route('spp');
    }

    public function save_siswa(Request $request){

        $siswa = new Siswa();
        $siswa->nisn = $request->nisn;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->alamat = $request->alamat;
        $siswa->no_telp = $request->no_telp;
        $siswa->id_spp = $request->id_spp;
        $siswa->save();

        return redirect()->route('siswa');
    }

    public function delete_siswa(Request $request){
        $data = Siswa::where('nisn', $request->nisn);
        $data->delete();
        return redirect()->route('siswa');
    }

    public function edit_siswa(Request $request){
        $data = Siswa::where('nisn', $request->nisn);
        $data->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_spp' => $request->id_spp
        ]);

        return redirect()->route('siswa');
    }

    public function save_petugas(Request $request){


        $petugas = new User();
        $petugas->username = $request->username;
        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->password = $request->password;
        $petugas->level = $request->level;
        $petugas->save();

        return redirect()->route('petugas');
    }

    public function delete_petugas(Request $request){
        $data = User::where('id_petugas', $request->id_petugas);
        $data->delete();
        return redirect()->route('petugas');
    }

    public function edit_petugas(Request $request){
      
        $data = User::where('id_petugas', $request->id_petugas);
        $data->update([
            'nama_petugas' => $request->nama,
            'username' => $request->uname,
            'level' => $request->level,
        ]);

        return redirect()->route('petugas');
    }

}
