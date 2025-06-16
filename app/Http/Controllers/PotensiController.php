<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Produk;

class PotensiController extends Controller
{
    /**
     * Menampilkan halaman utama Potensi.
     * Method ini akan dipanggil oleh rute '/potensi'.
     */
    public function index(): View
    {
        // Kode ini memerintahkan Laravel untuk mencari dan menampilkan
        // file view yang ada di: /resources/views/potensi/index.blade.php
        return view('potensi.pertanian');
    }
    public function showPertanianSawah(): View
    {
        // Kode ini akan mencari file view di:
        // /resources/views/potensi/show-pertanian.blade.php
        return view('potensi.show-pertanian');
    }
    public function showLidahBuaya(): View
    {
        // Kode ini akan mencari file view di:
        // /resources/views/potensi/show-lidah-buaya.blade.php
        return view('potensi.show-lidah-buaya');
    }
    public function showHidroponik(): View
    {
        // Kode ini akan mencari file view di:
        // /resources/views/potensi/show-hidroponik.blade.php
        return view('potensi.show-hidroponik');
    }

    public function umkm(Request $request)
    {
    // Ambil query builder untuk model Produk
    $query = Produk::query();

    // 1. Logika untuk Filter Kategori
    if ($request->filled('kategori')) {
        $query->where('kategori', $request->kategori);
    }

    // 2. Logika untuk Kotak Pencarian (sekalian kita buat)
    if ($request->has('search') && $request->search != '') {
        $query->where(function($q) use ($request) {
            $q->where('jenis_usaha', 'like', '%' . $request->search . '%')
              ->orWhere('nama_pemilik', 'like', '%' . $request->search . '%');
        });
    }

    // Eksekusi query untuk mendapatkan produk yang sudah terfilter
    $filtered_produk = $query->paginate(8);

    // Ambil daftar kategori unik dari database untuk ditampilkan di dropdown
    $semua_kategori = Produk::select('kategori')->distinct()->pluck('kategori');

    // Kirim data yang sudah terfilter dan daftar kategori ke view
    return view('potensi.umkm', [
        'produks' => $filtered_produk,
        'kategori_list' => $semua_kategori
    ]);
    }
}
