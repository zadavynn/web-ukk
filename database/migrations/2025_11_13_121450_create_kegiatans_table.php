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
        Schema::create('kegiatans', function (Blueprint $table) {

            // Primary key
            $table->id();

            // Nama kegiatan
            $table->string('nama');

            // Tanggal kegiatan
            $table->date('tanggal');

            // Lokasi kegiatan
            $table->string('lokasi');

            // Status kegiatan
            $table->enum('status', ['belum_selesai', 'selesai'])->default('belum_selesai');

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
        Schema::dropIfExists('kegiatans');
    }
};
