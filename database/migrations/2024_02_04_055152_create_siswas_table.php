<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->char('nisn', 10)->primary();
            $table->char('nis', 8);
            $table->string('nama', 35);
            $table->unsignedBigInteger('id_kelas');
            $table->text('alamat');
            $table->string('no_telp', 13);
            $table->unsignedBigInteger('id_spp');

            $table->foreign('id_kelas')->references('id_kelas')->on('kelas');
            $table->foreign('id_spp')->references('id_spp')->on('spp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
