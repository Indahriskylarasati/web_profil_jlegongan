<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Menampilkan halaman utama yang berisi semua produk
     * dengan fitur filter dan pencarian.
     */
   public function index(Request $request)
{
    // Mengambil semua kategori unik dari produk untuk ditampilkan di dropdown filter
    $kategori_list = Produk::select('kategori')->distinct()->pluck('kategori');

    // Memulai query builder
    $query = Produk::query();

    // Filter berdasarkan pencarian (search)
    if ($request->has('search') && $request->search != '') {
        $searchTerm = $request->search;
        
        // Lakukan pencarian di beberapa kolom sekaligus
        $query->where(function ($q) use ($searchTerm) {
            // Cari di kolom 'jenis_usaha' ATAU di kolom 'nama_pemilik'
            $q->where('jenis_usaha', 'like', '%' . $searchTerm . '%')
              ->orWhere('nama_pemilik', 'like', '%' . $searchTerm . '%');
        });
    }

    // Filter berdasarkan kategori
    if ($request->has('kategori') && $request->kategori != '') {
        $query->where('kategori', $request->kategori);
    }

    // PERBAIKAN: Menggunakan method paginate() yang benar, bukan pagination()
    $produks = $query->latest()->paginate(12);

    // PERBAIKAN: Pastikan view mengarah ke 'produk.index'
    return view('produk.index', [
        'produks' => $produks,
        'kategori_list' => $kategori_list,
    ]);
}
}