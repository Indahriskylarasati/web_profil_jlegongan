@extends('layouts.app')

@section('title', 'Struktur Organisasi - Dusun Jlegongan')

@push('styles')
    <style>
        /* Pengaturan Dasar Halaman (SUDAH DIPERBAIKI) */
        .container-utama {
            max-width: 1152px;
            margin-left: auto;
            margin-right: auto;
            padding: 64px 24px;
        }

        /* --- Pengaturan Header (MENGGUNAKAN TEKNIK FLEXBOX) --- */
        .header-grid {
            display: flex;
            flex-wrap: wrap;
            align-items: center; /* Kunci untuk mensejajarkan di tengah */
            gap: 32px;
            margin-bottom: 64px;
        }

        /* Aturan tambahan untuk memastikan kolom seimbang */
        .header-grid > div {
            flex: 1;
            min-width: 300px;
        }

        .header-subjudul {
            color: #F5D364;
            font-size: 24px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .header-judul-utama {
            color: #114661;
            font-size: 48px;
            font-weight: 800;
            margin-top: 8px;
            line-height: 1.1;
        }

        .header-deskripsi {
            color: #181823;
            font-size: 18px;
            line-height: 1.6;
            padding-top: 8px;
        }

        .garis-pemisah {
            border-color: #d1d5db;
            margin-bottom: 64px;
        }

        /* --- Pengaturan Kartu & Jarak --- */
        .grid-kartu-container {
            display: grid;
            gap: 50px;
        }

        .grid-baris-kartu {
            display: grid;
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 50px;
            justify-items: center;
        }

        .kartu-profil {
            position: relative;
            max-width: 384px;
            width: 100%;
            border-radius: 16px;
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .kartu-profil:hover {
            transform: translateY(-8px);
        }

        .kartu-profil-gambar {
            width: 100%;
            height: auto;
            aspect-ratio: 4 / 5;
            object-fit: cover;
        }
        
        .kartu-profil-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            color: white;
            padding: 40px 16px 20px;
            background: linear-gradient(to top, #0D3549 0%, rgba(0,0,0,0) 73%);
        }

        .kartu-profil-nama {
            font-size: 31px;
            font-weight: 700;
        }

        .kartu-profil-jabatan {
            font-size: 18px;
            font-style: italic;
            opacity: 0.9;
            margin-top: 2px;
        }

        /* --- Pengaturan Responsif untuk Layar Lebih Besar --- */
        @media (min-width: 1024px) { /* saya buat lebih lebar agar kolom tidak terlalu sempit */
            .grid-baris-kartu {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

    </style>
@endpush

@section('content')
    <div class="container-utama">
        <header class="header-grid">
            <div>
                <h2 class="header-subjudul">STOK</h2>
                <h1 class="header-judul-utama">Struktur Organisasi dan Tata Kerja Dusun Jlegongan</h1>
            </div>
            <div class="header-deskripsi">
                <p>
                    Struktur Organisasi dan Tata Kerja (SOTK) Dusun Jlegongan merupakan instrumen yang mengatur pembagian tugas, serta tanggung jawab dalam penyelenggaraan pemerintahan di tingkat dusun. Dusun Jlegongan merupakan bagian dari Pemerintah Desa yang dipimpin oleh seorang Kepala Dusun (Kadus), di bawah naungan Kepala Desa.
                </p>
                <p style="margin-top: 16px;">
                    Dalam menjalankan tugasnya, Kepala Dusun dibantu oleh perangkat dusun lainnya dan kelembagaan masyarakat sebagai berikut.
                </p>
            </div>
        </header>

        <hr class="garis-pemisah">

        @php
            // Ambil data pengurus dari controller (pastikan sudah dikirim dari controller)
            $allPengurus = collect();
            if (isset($kepalaDusun)) $allPengurus = $allPengurus->push($kepalaDusun);
            if (isset($ketuaRW)) $allPengurus = $allPengurus->concat($ketuaRW);
            if (isset($ketuaRT)) $allPengurus = $allPengurus->concat($ketuaRT);
            if (isset($pengurusLain)) $allPengurus = $allPengurus->concat($pengurusLain);
            
            $sortedPengurus = $allPengurus->sortBy('urutan');
            $rows = $sortedPengurus->chunk(3);
        @endphp

        <div class="grid-kartu-container">
            @foreach($rows as $row)
            <div class="grid-baris-kartu">
                @foreach($row as $pengurus)
                    <div class="kartu-profil">
                        <img src="{{ asset('storage/' . $pengurus->foto) }}" ... >
                        <div class="kartu-profil-overlay">
                            <h3 class="kartu-profil-nama">{{ $pengurus->nama }}</h3>
                            <p class="kartu-profil-jabatan">{{ $pengurus->jabatan }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            @endforeach
        </div>

    </div>
@endsection