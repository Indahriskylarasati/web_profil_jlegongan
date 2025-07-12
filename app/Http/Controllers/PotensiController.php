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
      public function pertanian()
    {
        $heroData = [
        'judul' => 'Potensi Pertanian',
        'subjudul' => 'Kekayaan Alam dari Tanah Jlegongan',
        'deskripsi' => 'Lahan yang subur dan sistem irigasi yang baik memungkinkan warga untuk menanam padi, palawija, hingga komoditas unggulan seperti lidah buaya dan tanaman hidroponik.'
        ];

        // 1. Siapkan data untuk video Lidah Buaya
        $video_lidah_buaya = [
            (object)[
                'url' => 'https://youtu.be/eTeUZ9qaRZ8?si=cGoIL8mPAYjIN2j4',
                'title' => 'Lidah Buaya Sekali Tanam Bisa Panen Selama 10 Tahun, Permintaan Pasar & Harga Sangat Tinggi',
                'channel_name' => 'CapCapung'
            ],
            (object)[
                'url' => 'https://youtu.be/RVD7uSKEWmo?si=4CuphKAagNzTlT-J',
                'title' => 'BUDIDAYA LIDAH BUAYA SEKALI TANAM PENGHASILANNYA JANGKA PANJANG',
                'channel_name' => 'Ronarene VLOG'
            ],
            (object)[
                'url' => 'https://youtu.be/iifP2hj0RXg?si=H2XFgMUrwDACzhv1',
                'title' => 'Budidaya Lidah Buaya, Potensi Gagal Cuma 5%, Bisa Panen Terus Menerus',
                'channel_name' => 'TVBisnis'
            ]
        ];

        // 2. Siapkan data untuk video Hidroponik
        $video_hidroponik = [
            (object)[
                'url' => 'https://youtu.be/2MzjH4ZDKeA?si=K-J4PYX2FczvWyOv',
                'title' => 'Bisnis Hidroponik Menguntungkan dan Banyak Peminat',
                'channel_name' => 'Anggit Lili'
            ],
            (object)[
                'url' => 'https://youtu.be/psgAstueCN4?si=1A6Jh_7n-o9Bc2e2',
                'title' => 'Ibu Rumah Tangga Kreatif, Ber-Hidroponik di Halaman Rumah',
                'channel_name' => 'TANI JUARA'
            ]
        ];

        // Karena halaman ini statis (tidak mengambil data dari database),
        // kita hanya perlu mengembalikan view-nya saja.
        return view('potensi.pertanian', [
            'video_terkait_lidah_buaya' => $video_lidah_buaya,
            'video_terkait_hidroponik' => $video_hidroponik,
        ]);
    }
    
     public function showPertanianSawah()
    {
        
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

    public function masyarakat()
    {
        return view('potensi.masyarakat');
    }
}
