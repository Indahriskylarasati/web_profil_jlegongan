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
    Schema::create('demografis', function (Blueprint $table) {
        $table->id();

        // Data Utama
        $table->integer('penduduk_total')->default(0);
        $table->integer('kk_total')->default(0);
        $table->integer('laki_laki')->default(0);
        $table->integer('perempuan')->default(0);

        // Rincian Usia
        $table->integer('usia_balita')->default(0);
        $table->integer('usia_anak')->default(0);
        $table->integer('usia_remaja')->default(0);
        $table->integer('usia_dewasa')->default(0);
        $table->integer('usia_lansia')->default(0);
        $table->integer('usia_tidak_diketahui')->default(0);

        // Rincian Pendidikan
        $table->integer('pendidikan_tidak_sekolah')->default(0);
        $table->integer('pendidikan_belum_tamat_sd')->default(0);
        $table->integer('pendidikan_tamat_sd')->default(0);
        $table->integer('pendidikan_sltp')->default(0);
        $table->integer('pendidikan_slta')->default(0);
        $table->integer('pendidikan_diploma_1_2')->default(0);
        $table->integer('pendidikan_akademi_d3')->default(0);
        $table->integer('pendidikan_s1')->default(0);
        $table->integer('pendidikan_s2')->default(0);

        // Rincian Mata Pencaharian
        $table->integer('pekerjaan_buruh_harian_lepas')->default(0)->after('pekerjaan_buruh_tani');
        $table->integer('pekerjaan_karyawan_bumn')->default(0)->after('pekerjaan_buruh_harian_lepas');
        $table->integer('pekerjaan_pedagang')->default(0)->after('pekerjaan_karyawan_bumn');
        $table->integer('pekerjaan_dosen')->default(0)->after('pekerjaan_pedagang');
        $table->integer('pekerjaan_guru')->default(0)->after('pekerjaan_dosen');
        $table->integer('pekerjaan_karyawan_honorer')->default(0)->after('pekerjaan_guru');

        // Rincian Agama
        $table->integer('agama_islam')->default(0);
        $table->integer('agama_kristen')->default(0);
        $table->integer('agama_katholik')->default(0);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demografis');
    }
};
