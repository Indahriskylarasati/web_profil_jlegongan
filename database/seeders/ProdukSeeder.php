<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk; // Pastikan Model Produk sudah di-import

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        // Baris ini akan mengosongkan tabel produks SEBELUM diisi lagi
        Produk::query()->delete();

        $produks = [
            // Kategori: Kuliner
            ['nama_pemilik' => 'Endah Susilowati', 'jenis_usaha' => 'Aneka Olahan Lele', 'kategori' => 'Kuliner', 'nomor_wa' => '089696441309'],
            ['nama_pemilik' => 'Elisabeth Prasetyarini', 'jenis_usaha' => 'Waroeng Ndeso RnB Ngemils', 'kategori' => 'Kuliner', 'nomor_wa' => '085743226661'],
            ['nama_pemilik' => 'Sugiyanto', 'jenis_usaha' => 'Tempe Benguk & Geblek', 'kategori' => 'Kuliner', 'nomor_wa' => '082221342975'],
            ['nama_pemilik' => 'A. Purwastuti', 'jenis_usaha' => 'Jualan Sayur Mateng & Angkringan', 'kategori' => 'Kuliner', 'nomor_wa' => '082327537880'],
            ['nama_pemilik' => 'Sugiarto', 'jenis_usaha' => 'Kuliner Soto Lamongan & Penyetan', 'kategori' => 'Kuliner', 'nomor_wa' => '082223827927'],
            ['nama_pemilik' => 'Supriyono', 'jenis_usaha' => 'Freelance Snack', 'kategori' => 'Kuliner', 'nomor_wa' => '089648800466'],
            ['nama_pemilik' => 'Sugiyanta', 'jenis_usaha' => 'Angkringan', 'kategori' => 'Kuliner', 'nomor_wa' => '085641710907'],

            // Kategori: Pertanian, Peternakan & Perikanan
            ['nama_pemilik' => 'Siti Fadilah', 'jenis_usaha' => 'Sayur Hidroponik', 'kategori' => 'Pertanian, Peternakan & Perikanan', 'nomor_wa' => '081328777123'],
            ['nama_pemilik' => 'Tukimun', 'jenis_usaha' => 'Pembuatan Pupuk Pertanian', 'kategori' => 'Pertanian, Peternakan & Perikanan', 'nomor_wa' => '081325981866'],
            ['nama_pemilik' => 'Suparyatdiono', 'jenis_usaha' => 'Jasa Traktor', 'kategori' => 'Pertanian, Peternakan & Perikanan', 'nomor_wa' => '085643676116'],
            ['nama_pemilik' => 'Rochani', 'jenis_usaha' => 'Ternak Bebek', 'kategori' => 'Pertanian, Peternakan & Perikanan', 'nomor_wa' => '089616033339'],
            ['nama_pemilik' => 'Kristianto', 'jenis_usaha' => 'Ikan Laut', 'kategori' => 'Pertanian, Peternakan & Perikanan', 'nomor_wa' => '081227018126'],

            // Kategori: Kerajinan & Industri Rumah Tangga
            ['nama_pemilik' => 'Triyono', 'jenis_usaha' => 'Bata Merah', 'kategori' => 'Kerajinan & Industri Rumah Tangga', 'nomor_wa' => '0895411141996'],
            ['nama_pemilik' => 'Rikky nur kresnawan', 'jenis_usaha' => 'Roupa Screen Printing', 'kategori' => 'Kerajinan & Industri Rumah Tangga', 'nomor_wa' => '081235570323'],

            // Kategori: Jasa
            ['nama_pemilik' => 'Bindi Kurniawan', 'jenis_usaha' => 'Material (Batu dan Pasir)', 'kategori' => 'Jasa', 'nomor_wa' => '085743226661'],
            ['nama_pemilik' => 'Margareta Heru Istiowati', 'jenis_usaha' => 'Laundry', 'kategori' => 'Jasa', 'nomor_wa' => '0882003414194'],
            ['nama_pemilik' => 'Muhammad Eko Pamuji', 'jenis_usaha' => 'Jasa Desain Interior & Eksterior', 'kategori' => 'Jasa', 'nomor_wa' => '0895376504033'],
            ['nama_pemilik' => 'Noviyati Sholikah', 'jenis_usaha' => 'Riavi Desain Grafis', 'kategori' => 'Jasa', 'nomor_wa' => '08979096994'],
            ['nama_pemilik' => 'Yohanes Sarjo', 'jenis_usaha' => 'Orgen Tunggal & Privat Orgen', 'kategori' => 'Jasa', 'nomor_wa' => '087899907771'],
            ['nama_pemilik' => 'Petrus Chanel Toni W', 'jenis_usaha' => 'Freelance Bengkel Pintu Mobil', 'kategori' => 'Jasa', 'nomor_wa' => '089619058266'],
            
            // Kategori: Kesehatan / Kecantikan
            ['nama_pemilik' => 'Kristina Prita Iswandari', 'jenis_usaha' => 'Pembalut Herbal Natesh', 'kategori' => 'Kesehatan / Kecantikan', 'nomor_wa' => '089527551684'],
            ['nama_pemilik' => 'Esti Wuryaningsih', 'jenis_usaha' => 'BMC, Cream Kesehatan', 'kategori' => 'Kesehatan / Kecantikan', 'nomor_wa' => '081804196852'],

            // Kategori: Perdagangan & Retail
            ['nama_pemilik' => 'Sriyani', 'jenis_usaha' => 'Distributor Gula Jahe & Budidaya Alpukat', 'kategori' => 'Perdagangan & Retail', 'nomor_wa' => '082137046610'],
            ['nama_pemilik' => 'Sunarmi', 'jenis_usaha' => 'Warung Sembako', 'kategori' => 'Perdagangan & Retail', 'nomor_wa' => '08983681590'],
        ];

        // Looping untuk memasukkan setiap data ke database
        foreach ($produks as $produk) {
            Produk::create($produk);
        }
    }
}