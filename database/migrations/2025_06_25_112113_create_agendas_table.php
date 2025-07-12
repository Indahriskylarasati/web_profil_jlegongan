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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category'); // cth: Pemuda, PKK, KWT, dll.
            $table->string('schedule'); // cth: "Setiap tanggal 10"
            $table->text('description');
            $table->string('main_image')->nullable();
            $table->json('gallery')->nullable(); // Untuk menyimpan galeri foto tambahan
            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
