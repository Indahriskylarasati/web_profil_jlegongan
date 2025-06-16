<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;


class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data pengurus, diurutkan berdasarkan kolom 'urutan'
        $semuaPengurus = Pengurus::orderBy('urutan', 'asc')->get();

        // Kelompokkan data berdasarkan jabatan untuk layout yang spesifik
        // Anda bisa menyesuaikan 'jabatan' atau 'urutan' sesuai data di database Anda.
        
        $kepalaDusun = $semuaPengurus->where('jabatan', 'Kepala Dusun')->first();
        
        $ketuaRW = $semuaPengurus->whereIn('jabatan', ['Ketua RW 11', 'Ketua RW 12']);

        $ketuaRT = $semuaPengurus->whereIn('jabatan', ['Ketua RT 1', 'Ketua RT 2', 'Ketua RT 3', 'Ketua RT 4']);

        // Kelompokkan sisa pengurus, kita asumsikan urutannya berlanjut
        $pengurusLain = $semuaPengurus->whereNotIn('jabatan', [
            'Kepala Dusun',
            'Ketua RW 11', 
            'Ketua RW 12', 
            'Ketua RT 1', 
            'Ketua RT 2', 
            'Ketua RT 3', 
            'Ketua RT 4'
        ]);

        // Kirim data yang sudah dikelompokkan ke view
        return view('profil_dusun.struktur_pengurus', [
            'title'         => 'Struktur Organisasi Dusun Jlegongan',
            'kepalaDusun'   => $kepalaDusun,
            'ketuaRW'       => $ketuaRW,
            'ketuaRT'       => $ketuaRT,
            'pengurusLain'  => $pengurusLain,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
