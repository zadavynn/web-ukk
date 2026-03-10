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
        // Buat tabel
        Schema::create('absensis', function (Blueprint $table) {

            // Primary key
            $table->id();

            // Nama kegiatan
            $table->string('kegiatan');

            // Nama kelas
            $table->string('kelas');

            // Jumlah hadir
            $table->integer('jumlah_hadir');

            // Timestamp
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus tabel
        Schema::dropIfExists('absensis');
    }
};
