<?php


use App\Http\Controllers\AgendaController;
use App\Http\Controllers\DemografiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilDusunController;
use App\Http\Controllers\PotensiController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BeritaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- RUTE HALAMAN DEPAN ---
Route::get('/', 
    [ProfilDusunController::class, 'index'])->name('home');


// --- RUTE PROFIL & STRUKTUR ---
Route::get('/profil-dusun', [ProfilDusunController::class, 'index'])->name('profil.dusun');
Route::get('/struktur-pengurus', [PengurusController::class, 'index'])->name('pengurus.index'); 


// --- RUTE POTENSI ---
Route::get('/potensi/umkm', [PotensiController::class, 'umkm'])->name('potensi.umkm');
Route::get('/potensi/pertanian', [PotensiController::class, 'pertanian'])->name('potensi.pertanian');
Route::get('potensi/show-pertanian', [PotensiController::class, 'showPertanianSawah'])->name('potensi.show-pertanian');
Route::get('/potensi/show-lidah-buaya', [PotensiController::class, 'showLidahBuaya'])->name('potensi.show-lidah-buaya');
Route::get('/potensi/show-hidroponik', [PotensiController::class, 'showHidroponik'])->name('potensi.show-hidroponik');
Route::get('/potensi/masyarakat', [PotensiController::class, 'masyarakat'])->name('potensi.masyarakat');


// --- RUTE PRODUK ---
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');


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

// --- RUTE BERITA ---
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
// Rute untuk menampilkan satu berita berdasarkan slug-nya
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');


// --- RUTE DEMOGRAFI ---
Route::get('/demografi', [DemografiController::class, 'index'])->name('demografi.index');

// --- RUTE AGENDA ---
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');


require __DIR__.'/auth.php';