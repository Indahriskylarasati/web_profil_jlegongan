@extends('layouts.app')

@section('title', 'Produk Unggulan - Dusun Jlegongan')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/potensi-umkm.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
@endpush

@section('content')
    <!-- ===== SATUAN 2: HERO SECTION ===== -->
    <div class="hero-section-container">
        <section class="hero-section">
            <div class="swiper hero-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{ asset('images/hero/umkm1.jpg') }}" alt="Pemandangan Dusun 1" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/2E3A87/FFFFFF?text=Gambar+1+Tidak+Ditemukan';"></div>
                    <div class="swiper-slide"><img src="{{ asset('images/hero/umkm2.jpg') }}" alt="Aktivitas Warga Dusun" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/4A55A2/FFFFFF?text=Gambar+2+Tidak+Ditemukan';"></div>
                    <div class="swiper-slide"><img src="{{ asset('images/hero/umkm3.jpg') }}" alt="Potensi Alam Dusun" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/7895CB/FFFFFF?text=Gambar+3+Tidak+Ditemukan';"></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="hero-content">
                <h1>Produk</h1>
                <h2>Produk Unggulan Jlegongan</h2>
                <p>Temukan berbagai produk berkualitas hasil karya warga, dari hasil bumi hingga kerajinan tangan yang kreatif</p>
            </div>
        </section>
    </div>

     <div class="page-container">
        <section class="umkm-content-section">
        {{-- FORM UNTUK FILTER DAN PENCARIAN --}}
        <form action="{{ route('produk.index') }}" method="GET" class="filter-bar mb-12">
            <div class="search-container">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="search" class="search-input" placeholder="Cari produk atau nama pemilik..." value="{{ request('search') }}">
            </div>
            <div class="category-container">
                <select name="kategori" class="category-dropdown" onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    {{-- Loop untuk menampilkan opsi kategori dari controller --}}
                    @foreach ($kategori_list as $kategori_item)
                        <option value="{{ $kategori_item }}" {{ request('kategori') == $kategori_item ? 'selected' : '' }}>
                            {{ $kategori_item }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        {{-- GRID PRODUK (DINAMIS DARI DATABASE) --}}
        <div class="umkm-grid">
            @if(count($produks) > 0)
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
                 @else
                <p>Belum ada data UMKM yang cocok dengan pencarian/kategori Anda.</p>
            @endif
            </div>

            {{-- LINK PAGINATION (PENOMORAN HALAMAN) --}}
            <div class="pagination-container">
                @if ($produks->hasPages())
                    <ul class="pagination">
                        {{-- Tombol "Previous" --}}
                        @if ($produks->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">&lsaquo;</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $produks->previousPageUrl() }}">&lsaquo;</a></li>
                        @endif

                        {{-- Loop untuk Nomor Halaman --}}
                        @for ($page = 1; $page <= $produks->lastPage(); $page++)
                            @if ($page == $produks->currentPage())
                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $produks->url($page) }}">{{ $page }}</a></li>
                            @endif
                        @endfor

                        {{-- Tombol "Next" --}}
                        @if ($produks->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $produks->nextPageUrl() }}">&rsaquo;</a></li>
                        @else
                            <li class="page-item disabled"><span class="page-link">&rsaquo;</span></li>
                        @endif
                    </ul>
                @endif
            </div>
                
        </div> 

    {{-- Memberi jarak di bagian paling bawah halaman --}}
    <div style="margin-bottom: 2.5rem;"></div>
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
