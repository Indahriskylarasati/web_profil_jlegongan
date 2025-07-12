@extends('layouts.app')

@section('title', 'Struktur Organisasi - Dusun Jlegongan')

@push('styles')
    <style>
    /* Pengaturan Dasar Halaman */
    .container-utama {
        max-width: 72rem; /* Dibiarkan px untuk pembatas utama, atau bisa jadi 72rem */
        margin-left: auto;
        margin-right: auto;
        padding: 4rem 1.5rem; /* 64px 24px */
    }

    /* --- Pengaturan Header --- */
    .header-grid {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 2rem; /* 32px */
        margin-bottom: 4rem; /* 64px */
    }

    .header-grid > div {
        flex: 1;
        min-width: 300px; /* Boleh tetap px untuk layout dasar */
    }

    .header-subjudul {
        color: #F5D364;
        font-size: 1.5rem; /* 24px */
        font-weight: 950;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .header-judul-utama {
        color: #114661;
        font-size: 3rem; /* 48px */
        font-weight: 800;
        margin-top: 0.5rem; /* 8px */
        line-height: 1.1;
    }

    .header-deskripsi {
        color: #181823;
        font-size: 1.125rem; /* 18px */
        line-height: 1.6;
        padding-top: 0.5rem; /* 8px */
    }

    .garis-pemisah {
        border-color: #d1d5db;
        margin-bottom: 4rem; /* 64px */
    }

    /* --- Pengaturan Kartu & Jarak --- */
    .grid-kartu-container {
        display: grid;
        gap: 3rem; /* 50px dibulatkan ke 48px (3rem) agar konsisten */
    }

    .grid-baris-kartu {
        display: grid;
        grid-template-columns: repeat(1, minmax(0, 1fr));
        gap: 3rem; /* 50px dibulatkan ke 48px (3rem) */
        justify-items: center;
    }

    .kartu-profil {
        position: relative;
        max-width: 384px; /* Dibiarkan px untuk pembatas utama, atau bisa jadi 24rem */
        width: 100%;
        border-radius: 1rem; /* 16px */
        box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .kartu-profil:hover {
        transform: translateY(-0.5rem); /* -8px */
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
        padding: 2.5rem 1rem 1.25rem; /* 40px 16px 20px */
        background: linear-gradient(to top, #0D3549 0%, rgba(0,0,0,0) 73%);
        min-height: 9rem; /* Sekitar 144px */
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

    .kartu-profil-nama {
        font-size: 1.5rem; /* 24px */
        font-weight: 700;
        line-height: 1.2;
    }

    .kartu-profil-jabatan {
        font-size: 1rem; /* 16px */
        font-style: italic;
        opacity: 0.9;
        margin-top: 0.25rem; /* 4px */
        line-height: 1.4;
    }

    /* --- Pengaturan Responsif --- */
    @media (min-width: 1024px) {
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
                            <img src="{{ asset('storage/' . $pengurus->foto) }}" alt="Foto {{ $pengurus->nama }}" class="kartu-profil-gambar">
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