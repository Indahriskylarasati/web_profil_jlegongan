<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demografi extends Model
{
    use HasFactory;

    /**
     * PERBAIKAN: Mendaftarkan semua kolom agar bisa diisi dari form.
     */
    protected $fillable = [
        'penduduk_total',
        'kk_total',
        'laki_laki',
        'perempuan',
        'usia_balita',
        'usia_anak',
        'usia_remaja',
        'usia_dewasa',
        'usia_lansia',
        'usia_tidak_diketahui',
        'pendidikan_tidak_sekolah',
        'pendidikan_belum_tamat_sd',
        'pendidikan_tamat_sd',
        'pendidikan_sltp',
        'pendidikan_slta',
        'pendidikan_diploma_1_2',
        'pendidikan_akademi_d3',
        'pendidikan_s1',
        'pendidikan_s2',
        'pekerjaan_belum_tidak_bekerja',
        'pekerjaan_mengurus_rumah_tangga',
        'pekerjaan_pelajar_mahasiswa',
        'pekerjaan_pensiunan',
        'pekerjaan_pns',
        'pekerjaan_tni',
        'pekerjaan_polri',
        'pekerjaan_perangkat_desa',
        'pekerjaan_wiraswasta',
        'pekerjaan_petani',
        'pekerjaan_buruh_tani',
        'pekerjaan_buruh_harian_lepas', // Ditambahkan dari data Anda
        'pekerjaan_karyawan_bumn',      // Ditambahkan dari data Anda
        'pekerjaan_pedagang',             // Ditambahkan dari data Anda
        'pekerjaan_dosen',                // Ditambahkan dari data Anda
        'pekerjaan_guru',                 // Ditambahkan dari data Anda
        'pekerjaan_karyawan_honorer',   // Ditambahkan dari data Anda
        'agama_islam',
        'agama_kristen',
        'agama_katholik',
        'wilayah_rt_1',
        'wilayah_rt_2',
        'wilayah_rt_3',
        'wilayah_rt_4',
        'lk_dewasa',
        'lk_lansia',
        'lk_remaja',
        'lk_anak',
        'lk_balita',
        'lk_tidak_diketahui',
        'pr_dewasa',
        'pr_lansia',
        'pr_remaja',
        'pr_anak',
        'pr_balita',
        'pr_tidak_diketahui',
    ];
}