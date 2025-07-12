<?php
// =================================================================
// File: app/Http/Controllers/AgendaController.php
// (Ganti seluruh isi file Anda dengan kode ini)
// =================================================================
namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index(Request $request)
    {
        // Daftar kategori yang akan ditampilkan sebagai filter tombol
        $categories = [
            'Pemuda Jlegongan',
            'Ibu PKK',
            'KWT',
            'Posyandu',
            'Kegiatan Kerohanian'
        ];

        // Query dasar untuk mengambil semua agenda
        $query = Agenda::query();

        // Logika untuk filter berdasarkan kategori yang di-klik
        // 'kategori' diambil dari nama parameter di URL (contoh: /agenda?kategori=Ibu+PKK)
        $query->when($request->kategori, function ($q, $kategori) {
            return $q->where('category', $kategori);
        });
        
        // Ambil data agenda, urutkan dari yang terbaru
        $agendas = $query->latest()->get();

        // Kirim semua data yang dibutuhkan ke view
        return view('agenda.index', [
            'agendas' => $agendas,
            'categories' => $categories,
            'active_category' => $request->kategori // Untuk menandai tombol filter mana yang aktif
        ]);
    }
}
