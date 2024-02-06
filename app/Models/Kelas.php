<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    public $timestamps = false;

    public function siswa(){
        return $this->hasMany(Siswa::class, 'id_kelas', 'id_kelas');
    }
}
