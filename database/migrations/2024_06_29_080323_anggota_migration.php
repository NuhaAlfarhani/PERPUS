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
        Schema::create('anggota', function (Blueprint $table) {
            $table->id('id_anggota')->primary();
            $table->string('nik', 16)->unique();
            $table->string('nama_anggota', 50);
            $table->string('hp', 13);
            $table->string('alamat', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('anggota')) {
            Schema::dropIfExists('anggota');
        }
    }
};
