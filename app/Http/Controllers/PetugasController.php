<?php

namespace App\Http\Controllers;
use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index_pembayaran(){
        return view('petugas.petugas.pembayaran',[
            'title' => 'Pembayaran',
            'data' => Pembayaran::all(),
            'siswa' => Siswa::all()
        ]);
    }

     public function save_pembayaran(Request $request){

         $idspp = Siswa::where('nisn', $request->nisn)->value('id_spp');

         $pembayaran = new Pembayaran();
         $pembayaran->id_petugas = $request->id_petugas;
         $pembayaran->nisn = $request->nisn;
         $pembayaran->tgl_bayar = $request->tgl_bayar;
         $pembayaran->bulan_dibayar = $request->bulan_dibayar;
         $pembayaran->tahun_dibayar = $request->tahun_dibayar;
         $pembayaran->id_spp = $idspp;
         $pembayaran->jumlah_bayar = $request->jumlah_bayar;
         $pembayaran->save();


        return redirect()->route('pembayaran');
    }

    public function delete_pembayaran(Request $request){
        $data = Pembayaran::where('id_pembayaran', $request->id);
        $data->delete();
        return redirect()->route('pembayaran');
    }

    public function edit_petugas(Request $request){
      
        // $data = User::where('id_petugas', $request->id_petugas);
        // $data->update([
        //     'nama_petugas' => $request->nama,
        //     'username' => $request->uname,
        //     'level' => $request->level,
        // ]);

        return redirect()->route('pembayaran');
    }
}
