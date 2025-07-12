@extends('layouts.app')
@section('title', 'Potensi UMKM - Dusun Jlegongan')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/potensi-umkm.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    {{-- Font Awesome untuk ikon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
@endpush

@section('content')
    <!-- ===== SATUAN 2: HERO SECTION ===== -->
    <div class="hero-section-container">
        <section class="hero-section">
            <div class="swiper hero-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{ asset('images/hero/WhatsApp Image 2025-06-26 at 16.39.14_9bdcf63b.jpg') }}" alt="Pemandangan Dusun 1" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/2E3A87/FFFFFF?text=Gambar+1+Tidak+Ditemukan';"></div>
                    <div class="swiper-slide"><img src="{{ asset('images/hero/umkm.PNG') }}" alt="Aktivitas Warga Dusun" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/4A55A2/FFFFFF?text=Gambar+2+Tidak+Ditemukan';"></div>
                    <div class="swiper-slide"><img src="{{ asset('images/hero/WhatsApp Image 2025-06-26 at 16.39.14_0b450e07.jpg') }}" alt="Potensi Alam Dusun" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/7895CB/FFFFFF?text=Gambar+3+Tidak+Ditemukan';"></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="hero-content">
                <h1>Potensi</h1>
                <h2>Sumber Daya Dusun Jlegongan</h2>
                <p>Dusun Jlegongan menyimpan beragam potensi yang layak dikembangkan, hasil alam yang melimpah, tenaga kerja lokal yang terampil, hingga semangat wirausaha yang tumbuh di tengah masyarakat.</p>
            </div>
        </section>
    </div>

    <div class="page-container">
        {{-- Navigasi Sub-menu Potensi --}}
        <nav class="sub-nav-container">
            <a href="{{ route('potensi.pertanian') }}" class="sub-nav-button inactive">
                <i class="fa-solid fa-seedling"></i> Potensi Pertanian
            </a>
            
            {{-- Navigasi sub-menu UMKM --}}
            <a href="{{ route('potensi.umkm') }}" class="sub-nav-button active">
                <i class="fa-solid fa-store"></i> Potensi UMKM
            </a>

            {{-- Navigasi sub-menu Masyarakat --}}
            <a href="{{ route('potensi.masyarakat') }}" class="sub-nav-button inactive">
                <i class="fa-solid fa-users"></i> Potensi Masyarakat
            </a>
        </nav>


        {{-- KONTEN UMKM --}}
        <section class="umkm-content-section">
            <div class="umkm-header-title">
                <p class="umkm-subtitle">Yuk kepoin !</p>
                <h2 class="umkm-main-title">UMKM Berkembang di Dusun Jlegongan</h2>
            </div>
            
            {{-- FORM UNTUKKATEGORI DAN PENCARIAN --}}
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

            <div class="umkm-grid">
                @forelse($produks as $produk)
                    <div class="card-umkm">
                        <div class="card-umkm-image">
                            @if($produk->foto_utama)
                                <img src="{{ asset('storage/' . $produk->foto_utama) }}" alt="{{ $produk->jenis_usaha }}">
                            @else
                                <div class="placeholder-image">
                                    <i class="fa-solid fa-camera"></i>
                                    <span>Foto Segera Hadir</span>
                                </div>
                            @endif
                        </div>
                        <div class="card-umkm-content">
                            <span class="card-umkm-category">{{ $produk->kategori }}</span>
                            <h3 class="card-umkm-title">{{ $produk->jenis_usaha }}</h3>
                            <p class="card-umkm-owner">Oleh: {{ $produk->nama_pemilik }}</p>
                            <p class="card-umkm-description">
                                {{ $produk->deskripsi ?? 'Deskripsi untuk produk ini akan segera ditambahkan.' }}
                            </p>
                        </div>
                        <div class="card-umkm-footer">
                            @if($produk->nomor_wa)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $produk->nomor_wa) }}" class="card-umkm-button" target="_blank" rel="noopener noreferrer">
                                    <i class="fa-brands fa-whatsapp"></i> Hubungi Penjual
                                </a>
                            @else
                                <a href="#" class="card-umkm-button" style="background-color: #9ca3af; cursor: not-allowed;">
                                    <i class="fa-brands fa-whatsapp"></i> Hubungi Penjual
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <div style="grid-column: 1 / -1; text-align: center; padding: 40px;">
                        <p>Belum ada data UMKM yang cocok dengan pencarian/kategori Anda.</p>
                    </div>
                @endforelse
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

            
        </section>
    </div>

    {{-- Jarak bagian paling bawah halaman --}}
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
