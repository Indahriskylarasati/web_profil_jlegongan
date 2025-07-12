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
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique(); // Untuk URL yang rapi, contoh: /berita/kegiatan-17-agustus
            $table->string('penulis')->default('Admin Dusun');
            $table->string('gambar_utama')->nullable(); // Path untuk gambar header berita
            $table->longText('isi'); // Isi dari artikel berita
            $table->timestamp('published_at')->nullable(); // Tanggal berita dipublikasikan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
