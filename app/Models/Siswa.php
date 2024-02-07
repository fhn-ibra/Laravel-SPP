<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'siswa';
    protected $primaryKey = 'nisn';

    public $timestamps = false;

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'nisn', 'nisn');
    }

    public function spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp', 'id_spp');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    public static function authenticate($nisn, $nama)
    {
        return static::where('nisn', $nisn)->where('nama', $nama)->first();
    }

}
