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
        Schema::create('panitias', function (Blueprint $table) {

            // Primary key
            $table->id();

            // Nama panitia
            $table->string('nama');

            // Jabatan panitia
            $table->enum('jabatan', ['ketua', 'wakil_ketua', 'bendahara', 'sekretaris', 'anggota'])->default('anggota');

            // Kelas panitia
            $table->enum('kelas', ['X RPL', 'X TKJ', 'XI RPL', 'XI TKJ', 'XII RPL', 'XII TKJ']);

            // Nomor telepon
            $table->string('telepon');

            // Quotes panitia
            $table->string('quotes');

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
        Schema::dropIfExists('panitias');
    }
};
