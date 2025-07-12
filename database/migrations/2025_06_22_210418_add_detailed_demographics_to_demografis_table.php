<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('demografis', function (Blueprint $table) {
            // Kolom untuk persebaran berdasarkan wilayah (RT)
            $table->integer('wilayah_rt_1')->default(0)->after('agama_katholik');
            $table->integer('wilayah_rt_2')->default(0)->after('wilayah_rt_1');
            $table->integer('wilayah_rt_3')->default(0)->after('wilayah_rt_2');
            $table->integer('wilayah_rt_4')->default(0)->after('wilayah_rt_3');

            // Hapus kolom lama yang kurang detail (jika perlu, atau biarkan saja)
            // $table->dropColumn(['laki_laki', 'perempuan', 'usia_balita', ...]);

            // Tambah kolom baru yang lebih detail
            // Laki-laki berdasarkan usia
            $table->integer('lk_dewasa')->default(0)->after('wilayah_rt_4');
            $table->integer('lk_lansia')->default(0)->after('lk_dewasa');
            $table->integer('lk_remaja')->default(0)->after('lk_lansia');
            $table->integer('lk_anak')->default(0)->after('lk_remaja');
            $table->integer('lk_balita')->default(0)->after('lk_anak');
            $table->integer('lk_tidak_diketahui')->default(0)->after('lk_balita');

            // Perempuan berdasarkan usia
            $table->integer('pr_dewasa')->default(0)->after('lk_tidak_diketahui');
            $table->integer('pr_lansia')->default(0)->after('pr_dewasa');
            $table->integer('pr_remaja')->default(0)->after('pr_lansia');
            $table->integer('pr_anak')->default(0)->after('pr_remaja');
            $table->integer('pr_balita')->default(0)->after('pr_anak');
            $table->integer('pr_tidak_diketahui')->default(0)->after('pr_balita');
        });
    }

    public function down(): void
    {
        Schema::table('demografis', function (Blueprint $table) {
            // Perintah untuk menghapus kolom jika migrasi dibatalkan
            $table->dropColumn([
                'wilayah_rt_1', 'wilayah_rt_2', 'wilayah_rt_3', 'wilayah_rt_4',
                'lk_dewasa', 'lk_lansia', 'lk_remaja', 'lk_anak', 'lk_balita', 'lk_tidak_diketahui',
                'pr_dewasa', 'pr_lansia', 'pr_remaja', 'pr_anak', 'pr_balita', 'pr_tidak_diketahui'
            ]);
        });
    }
};