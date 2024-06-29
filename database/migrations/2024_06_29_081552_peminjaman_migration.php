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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('id_peminjaman')->primary();
            $table->foreignId('id_anggota')->constrained('anggota');
            $table->foreignId('kode_buku')->constrained('buku');
            $table->foreignId('id_petugas')->constrained('petugas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('peminjaman')) {
            Schema::dropIfExists('peminjaman');
        }
    }
};
