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
            $table->string('nama_anggota')->references('nama_anggota')->on('anggota');
            $table->string('judul')->references('judul')->on('buku');
            $table->string('nama_petugas')->references('nama_petugas')->on('petugas');
            $table->timestamps();
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
