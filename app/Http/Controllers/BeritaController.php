<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // Pastikan ini di-import

class BeritaController extends Controller
{
    /**
     * Menampilkan halaman daftar semua berita.
     * Dipanggil oleh rute: berita.index
     */
    public function index(Request $request) // DIPERBAIKI: Menambahkan tipe 'Request'
    {
        // Query dasar
        $query = Berita::whereNotNull('published_at')
                        ->where('published_at', '<=', now())
                        ->latest('published_at');

        // HANYA Logika PENCARIAN jika ada input 'search'
        if ($request->has('search') && $request->input('search') != '') {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                // Mencari di judul ATAU konten
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }
        
        // Eksekusi query dengan pagination
        // withQueryString() agar pencarian tidak hilang saat pindah halaman
        $beritas = $query->paginate(8)->withQueryString();

        // Kirim data ke view (tanpa $kategori)
        return view('berita.index', compact('beritas'));
    }

    /**
     * Menampilkan halaman detail satu berita.
     * Dipanggil oleh rute: berita.show
     */
    public function show($slug)
    {
        // Ambil berita utama yang sedang dibuka
        $berita = Berita::where('slug', $slug)->firstOrFail();
        
        // Ambil 4 berita lain sebagai "Berita Lainnya"
        $beritaLainnya = Berita::where('id', '!=', $berita->id)
                            ->latest('published_at')
                            ->take(4)
                            ->get();
        
        // Kirim berita utama dan berita lainnya ke view
        return view('berita.show', compact('berita', 'beritaLainnya'));
    }
}
