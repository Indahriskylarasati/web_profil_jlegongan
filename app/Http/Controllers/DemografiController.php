<?php
namespace App\Http\Controllers;
use App\Models\Demografi; // Import model

class DemografiController extends Controller {
    public function index() {
        // Ambil data demografi pertama (dan satu-satunya) dari database
        $data = Demografi::first();

        // Jika tidak ada data sama sekali, kirim data kosong agar tidak error
        if (!$data) {
            $data = new Demografi(); // Membuat objek kosong
        }

        return view('demografi.index', compact('data'));
    }
}