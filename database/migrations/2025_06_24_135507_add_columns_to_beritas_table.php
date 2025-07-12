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
        Schema::table('beritas', function (Blueprint $table) {
            // Menambahkan kolom-kolom yang hilang setelah kolom 'id'
            $table->string('title')->after('id');
            $table->string('slug')->unique()->after('title');
            $table->string('image')->nullable()->after('slug');
            $table->text('content')->after('image');
            $table->date('published_at')->nullable()->after('content');
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('beritas', function (Blueprint $table) {
            // Ini adalah kebalikan dari 'up', untuk jaga-jaga jika perlu rollback
            $table->dropColumn(['title', 'slug', 'image', 'content', 'published_at']);
        });
    }
};