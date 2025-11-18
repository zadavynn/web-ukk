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
        Schema::table('panitias', function (Blueprint $table) {
            $table->enum('jabatan', ['ketua', 'wakil_ketua', 'bendahara', 'sekretaris', 'anggota'])->default('anggota');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('panitias', function (Blueprint $table) {
            $table->dropColumn('jabatan');
        });
    }
};
