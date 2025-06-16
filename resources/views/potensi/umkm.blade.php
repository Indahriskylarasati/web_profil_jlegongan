{{-- ================================================================= --}}
{{--        KODE LENGKAP UNTUK resources/views/potensi/umkm.blade.php    --}}
{{-- ================================================================= --}}

@extends('layouts.app')

@section('title', 'Potensi UMKM - Dusun Jlegongan')

@push('styles')
    {{-- Memanggil file CSS yang sudah kita buat --}}
    <link rel="stylesheet" href="{{ asset('css/potensi-umkm.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    {{-- Font Awesome untuk ikon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
@endpush

@section('content')
<div class="umkm-page-wrapper">
    {{-- Hero Section untuk Halaman Potensi --}}
    <div class="hero-section-container">
        <section class="hero-section">
            <div class="swiper hero-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{ asset('images/hero/gambar1.jpg') }}" alt="Pemandangan Dusun 1" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/2E3A87/FFFFFF?text=Latar+Belakang+1';"></div>
                    <div class="swiper-slide"><img src="{{ asset('images/potensi/pertanian-sawah.jpg') }}" alt="Pemandangan Dusun 2" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/4A55A2/FFFFFF?text=Latar+Belakang+2';"></div>
                    <div class="swiper-slide"><img src="{{ asset('images/potensi/lidah-buaya.jpg') }}" alt="Pemandangan Dusun 3" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/7895CB/FFFFFF?text=Latar+Belakang+3';"></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="hero-content">
                <h1>Potensi</h1>
                <h2>Sumber daya Dusun Jlegongan</h2>
                <p>Dusun Jlegongan menyimpan beragam potensi yang layak dikembangkan, hasil alam yang melimpah, tenaga kerja lokal yang terampil, hingga semangat wirausaha yang tumbuh di tengah masyarakat. Mari bergandengan tangan membangun sinergi bersama demi masa depan dusun yang mandiri dan berdaya saing.</p>
            </div>
        </section>
    </div>

    {{-- KONTEN UTAMA HALAMAN --}}
    <div class="page-container">
        {{-- NAVIGASI SUB-MENU --}}
        <nav class="sub-nav-container">
            {{-- Tombol Potensi Pertanian dengan ikon daun --}}
            <a href="{{ route('potensi.pertanian') }}" class="sub-nav-button inactive">
                <i class="fa-solid fa-seedling"></i> Potensi Pertanian
            </a>

            {{-- Tombol Potensi UMKM dengan ikon toko --}}
            <a href="{{ route('potensi.umkm') }}" class="sub-nav-button active">
                <i class="fa-solid fa-store"></i> Potensi UMKM
            </a>

            {{-- Tombol Potensi Masyarakat dengan ikon orang --}}
            <a href="#" class="sub-nav-button inactive">
                <i class="fa-solid fa-users"></i> Potensi Masyarakat
            </a>
        </nav>

        {{-- BAGIAN UTAMA KONTEN UMKM --}}
        <section class="umkm-content-section">
        
            {{-- ↓↓↓ TAMBAHKAN BLOK KODE INI ↓↓↓ --}}
            <div class="umkm-header-title">
                <p class="umkm-subtitle">Yuk kepoin !</p>
                <h2 class="umkm-main-title">UMKM Berkembang di Dusun Jlegongan</h2>
            </div>
            
            {{-- FORM UNTUK FILTER DAN PENCARIAN --}}
            <form action="{{ route('potensi.umkm') }}" method="GET" class="filter-bar">
                <div class="search-container">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" name="search" class="search-input" placeholder="Cari produk atau UMKM..." value="{{ request('search') }}">
                </div>
                <div class="category-container">
                    <select name="kategori" class="category-dropdown" onchange="this.form.submit()">
                        <option value="">Semua Kategori</option>
                        @foreach ($kategori_list as $kategori_item)
                            <option value="{{ $kategori_item }}" {{ request('kategori') == $kategori_item ? 'selected' : '' }}>
                                {{ $kategori_item }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>

            {{-- GRID PRODUK UMKM (DINAMIS DARI DATABASE) --}}
            <div class="product-grid">
            @if($produks->isEmpty())
                <p>Belum ada data UMKM yang cocok dengan pencarian/kategori Anda.</p>
            @else
                @foreach ($produks as $produk)
                    {{-- STRUKTUR KARTU BARU --}}
                    <div class="card-umkm">
                        {{-- BAGIAN GAMBAR --}}
                        <div class="card-umkm-image">
                            {{-- Ini akan menampilkan foto_utama, atau gambar placeholder jika fotonya kosong --}}
                            <img src="{{ asset('storage/' . ($produk->foto_utama ?? 'placeholder.png')) }}" ... >
                            {{-- Ini adalah placeholder yang<img akan muncul jika gambar tidak ditemukan --}}
                            <div class="placeholder-image">
                                <i class="fa-solid fa-camera"></i>
                                <span>Foto Segera Hadir</span>
                            </div>
                        </div>

                        {{-- BAGIAN KONTEN TEKS --}}
                        <div class="card-umkm-content">
                            <span class="card-umkm-category">{{ $produk->kategori }}</span>
                            <h3 class="card-umkm-title">{{ $produk->jenis_usaha }}</h3>
                            <p class="card-umkm-owner">Oleh: {{ $produk->nama_pemilik }}</p>
                            
                            {{-- Deskripsi hanya akan tampil jika ada isinya di database --}}
                            @if($produk->deskripsi)
                            <p class="card-umkm-description">{{ $produk->deskripsi }}</p>
                            @else
                            <p class="card-umkm-description">Deskripsi untuk produk ini akan segera ditambahkan.</p>
                            @endif
                        </div>

                        {{-- BAGIAN FOOTER (TOMBOL WA) --}}
                        <div class="card-umkm-footer">
                            @if($produk->nomor_wa)
                                <a href="https://wa.me/{{ $produk->nomor_wa }}" class="card-umkm-button" target="_blank" rel="noopener noreferrer">
                                    <i class="fa-brands fa-whatsapp"></i> Hubungi Penjual
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
            </div>

            {{-- LINK PAGINATION (PENOMORAN HALAMAN) --}}
            <div class="pagination-links">
                {{ $produks->appends(request()->query())->links() }}
            </div>
            
        </section>
    </div>

    {{-- Memberi jarak di bagian paling bawah halaman --}}
    <div style="margin-bottom: 6.4rem;"></div>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const heroSwiper = new Swiper('.hero-swiper', {
                loop: true,
                effect: 'fade',
                fadeEffect: { crossFade: true },
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        });
    </script>
@endpush
