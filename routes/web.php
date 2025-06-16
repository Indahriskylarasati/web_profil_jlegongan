<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

// --- CONTROLLER YANG KITA GUNAKAN ---
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilDusunController;
use App\Http\Controllers\PotensiController;
use App\Http\Controllers\PengurusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- RUTE HALAMAN DEPAN ---
Route::get('/', function () {
    return view('welcome');
})->name('home');


// --- RUTE PROFIL & STRUKTUR ---
Route::get('/profil-dusun', [ProfilDusunController::class, 'index'])->name('profil.dusun');
Route::get('/struktur-pengurus', [PengurusController::class, 'index'])->name('pengurus.index'); 


// --- RUTE POTENSI ---
Route::get('/potensi/umkm', [PotensiController::class, 'umkm'])->name('potensi.umkm');
Route::get('/potensi/pertanian', [PotensiController::class, 'pertanian'])->name('potensi.pertanian');


// --- RUTE UNTUK TESTING DATABASE (Boleh dihapus nanti) ---
Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return "Koneksi ke database BERHASIL.";
    } catch (\Exception $e) {
        die("Gagal terhubung ke database. Error: " . $e->getMessage());
    }
});


// --- RUTE BAWAAN LARAVEL BREEZE (JANGAN DIUBAH) ---
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';