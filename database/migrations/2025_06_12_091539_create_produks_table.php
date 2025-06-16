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
    Schema::create('produks', function (Blueprint $table) {
        $table->id();
        $table->string('nama_pemilik');
        $table->string('jenis_usaha');
        $table->text('deskripsi')->nullable();
        $table->string('kategori');
        $table->string('foto_utama')->nullable();
        $table->string('nomor_wa')->nullable();
        $table->string('akun_instagram')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
