<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;
    protected $table = 'petugas';

    public function siswa()
    {
        return $this->hasMany(Pembayaran::class, 'id_petugas', 'id_petugas');
    }
}
