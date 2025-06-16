<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
// PENJELASAN: Mengimpor model Pengurus agar kita bisa mengambil datanya.
use App\Models\Pengurus;

class ProfilDusunController extends Controller
{
    /**
     * Menampilkan halaman utama profil dusun.
     */
    public function index(): View
    {
        // PENJELASAN:
        // 1. Mengambil data dari tabel 'pengurus'.
        // 2. Diurutkan berdasarkan kolom 'urutan'.
        // 3. Hanya mengambil 3 data teratas.
        $pratinjauPengurus = Pengurus::orderBy('urutan')->take(3)->get();

        // PENJELASAN:
        // Mengirimkan variabel $pratinjauPengurus ke dalam view 
        // agar bisa digunakan di file profil_dusun/index.blade.php
        return view('profil_dusun.index', compact('pratinjauPengurus'));
    }
}
