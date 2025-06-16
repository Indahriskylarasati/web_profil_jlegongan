{{-- /resources/views/potensi/pertanian.blade.php --}}

@extends('layouts.app')

@section('title', 'Potensi Dusun - Dusun Jlegongan')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    /* === STRUKTUR HALAMAN POTENSI === */
    .page-container { max-width: 1152px; margin: auto; padding: 0 2.4rem; }
    .hero-section-container { padding: 2.4rem; }

    /* --- PENJELASAN PERUBAHAN: Ukuran Hero Section diperkecil --- */
    .hero-section {
        position: relative;
        height: 45vh; /* Diubah dari 70vh menjadi 45vh */
        min-height: 350px; /* Diubah dari 500px menjadi 350px */
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Inter', sans-serif;
        overflow: hidden;
        border-radius: 2.4rem;
    }
    
    .hero-section .swiper { width: 100%; height: 100%; position: absolute; top: 0; left: 0; z-index: 1; }
    .hero-section .swiper-slide img { display: block; width: 100%; height: 100%; object-fit: cover; filter: brightness(0.6); }

    .hero-content { position: relative; z-index: 2; text-align: center; padding: 2rem; max-width: 70rem; }
    .hero-content h1 { font-size: 2.4rem; /* 36px */ font-weight: 600; line-height: 1.2; margin-bottom: 0.8rem; /* 8px */  }
    .hero-content h2 { font-size: 3.2rem; /* 36px */ font-weight: 750; line-height: 1.2; margin-bottom: 0.8rem; /* 8px */ }
    .hero-content p { font-size: 1.6rem; /* 16px */ font-weight: 400; line-height: 1.7; opacity: 0.9; max-width: 60rem; /* 600px */ margin: auto }

    .hero-section .swiper-pagination { bottom: 2rem; }
    .hero-section .swiper-pagination-bullet { width: 1rem; height: 1rem; background-color: #F5D364; opacity: 0.7; transition: all 0.3s ease; margin: 0 0.5rem !important; }
    .hero-section .swiper-pagination-bullet-active { background-color: #114661; width: 2.5rem; border-radius: 0.5rem; opacity: 1; }

    /* === NAVIGASI SUB-MENU POTENSI === */
    .sub-nav-container { text-align: center; margin: 3.2rem 0; display: flex; gap: 1.6rem; justify-content: center; flex-wrap: wrap; }
    .sub-nav-button { padding: 1rem 2.4rem; font-size: 1.6rem; font-weight: 600; border-radius: 1.2rem; text-decoration: none; transition: all 0.3s; border: 2px solid transparent; cursor: pointer; }
    .sub-nav-button.active { background-color: #114661; color: white; border-color: #114661; }
    .sub-nav-button.inactive { background-color: #F5D364; color: #114661; border-color: #F5D364; }
    .sub-nav-button:hover { transform: translateY(-2px); }
    .sub-nav-button.inactive:hover { background-color: #114661; color: white; border-color: #114661; }

    /* === KONTEN POTENSI & PEMISAH === */
    .potensi-content-section { padding: 3.2rem 0; }
    .section-divider { border: 0; height: 1px; background-color: #e5e7eb; margin: 6.4rem 0; }
    .potensi-item-grid { display: grid; grid-template-columns: 1fr; gap: 4.8rem; align-items: center; }
    @media (min-width: 768px) { .potensi-item-grid { grid-template-columns: repeat(2, 1fr); } }
    .potensi-item-image { width: 100%; height: auto; border-radius: 1.6rem; object-fit: cover; aspect-ratio: 16/10; }
    .potensi-item-text h3 { font-size: 2.8rem; font-weight: 700; color: #114661; margin: 0 0 1.6rem 0; }
    .potensi-item-text p { font-size: 1.6rem; line-height: 1.8; color: #333; margin: 0 0 2.4rem 0; }
    .lihat-dokumentasi-button { background-color: #F5D364; color: #181823; padding: 1.2rem 2.4rem; border-radius: 0.8rem; text-decoration: none; font-weight: 600; display: inline-block; transition: background-color 0.3s; }
    .lihat-dokumentasi-button:hover { background-color: #ECF3F6; }

    /* === VIDEO TERKAIT === */
    .video-terkait-container { margin-top: 3.2rem; }
    .video-terkait-container h4 { font-size: 2rem; font-weight: 600; color: #114661; margin-bottom: 1.6rem; }
    .video-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2.4rem; }
    @media (min-width: 992px) { .video-grid { grid-template-columns: repeat(3, 1fr); } }
    .video-card { border-radius: 1.2rem; overflow: hidden; background-color: #fff; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06); }
    .video-thumbnail { position: relative; display: block; }
    .video-thumbnail img { width: 100%; height: auto; aspect-ratio: 16/9; object-fit: cover; display: block; }
    .play-icon { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 50px; height: 50px; background-color: rgba(255, 255, 255, 0.8); border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: transform 0.3s; }
    .video-card:hover .play-icon { transform: translate(-50%, -50%) scale(1.1); }
    .play-icon svg { width: 24px; height: 24px; fill: #114661; }
    .video-info { padding: 1.6rem; }
    .video-title { font-size: 1.6rem; font-weight: 600; color: #114661; margin: 0 0 0.8rem 0; }
    .video-channel { font-size: 1.3rem; color: #52525b; }
</style>
@endpush

@section('content')

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

    {{-- Konten yang dikembalikan --}}
    <div class="page-container">
        {{-- Navigasi Sub-menu Potensi --}}
        <nav class="sub-nav-container">
            {{-- Di halaman ini, tombol Pertanian yang aktif --}}
            <a href="{{ route('potensi.pertanian') }}" class="sub-nav-button active">
                <i class="fa-solid fa-seedling"></i> Potensi Pertanian
            </a>
            
            {{-- Tombol UMKM menjadi tidak aktif --}}
            <a href="{{ route('potensi.umkm') }}" class="sub-nav-button inactive">
                <i class="fa-solid fa-store"></i> Potensi UMKM
            </a>

            {{-- Tombol Masyarakat --}}
            <a href="#" class="sub-nav-button inactive">
                <i class="fa-solid fa-users"></i> Potensi Masyarakat
            </a>
        </nav>

        {{-- Konten Detail Potensi Pertanian --}}
        <section class="potensi-content-section">
            
            <!-- ===== Bagian Pertanian Sawah ===== -->
            <div class="potensi-item-grid">
                <div>
                    <img src="{{ asset('images/potensi/pertanian-sawah.jpg') }}" class="potensi-item-image" alt="Pertanian Sawah" onerror="this.onerror=null;this.src='https://placehold.co/600x400/cccccc/333333?text=Pertanian+Sawah';">
                </div>
                <div class="potensi-item-text">
                    <h3>Pertanian Sawah</h3>
                    <p>Sektor pertanian, khususnya persawahan, merupakan tulang punggung perekonomian Dusun Jlegongan. Lahan yang subur dan sistem irigasi yang baik memungkinkan warga untuk menanam padi dan berbagai jenis palawija...</p>
                    <a href="{{ route('potensi.show-pertanian') }}" class="lihat-dokumentasi-button">Lihat Selengkapnya</a>
                </div>
            </div>

            <hr class="section-divider">

            <!-- ===== Bagian Perkebunan Lidah Buaya ===== -->
            <div class="potensi-item-grid">
                <div class="potensi-item-text">
                    <h3>Perkebunan Lidah Buaya</h3>
                    <p>Perkebunan lidah buaya menjadi salah satu inovasi unggulan di dusun ini. Dikelola oleh Kelompok Wanita Tani (KWT), lidah buaya tidak hanya dijual mentah, tetapi juga diolah menjadi berbagai produk bernilai tambah...</p>
                    <a href="{{ route('potensi.show-lidah-buaya') }}" class="lihat-dokumentasi-button">Lihat Selengkapnya</a>
                </div>
                <div>
                    <img src="{{ asset('images/potensi/lidah-buaya.jpg') }}" class="potensi-item-image" alt="Perkebunan Lidah Buaya" onerror="this.onerror=null;this.src='https://placehold.co/600x400/cccccc/333333?text=Lidah+Buaya';">
                </div>
            </div>
            <div class="video-terkait-container">
                <h4>Video terkait</h4>
                <div class="video-grid">
                    <a href="#" target="_blank" rel="noopener noreferrer" class="video-card">
                        <div class="video-thumbnail">
                            <img src="https://placehold.co/400x225/cccccc/333333?text=Video+1" alt="Thumbnail Video 1">
                            <div class="play-icon"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                        <div class="video-info"><div class="video-title">Budidaya Lidah Buaya...</div><div class="video-channel">Youtube Chanel</div></div>
                    </a>
                    <a href="#" target="_blank" rel="noopener noreferrer" class="video-card">
                         <div class="video-thumbnail">
                            <img src="https://placehold.co/400x225/cccccc/333333?text=Video+2" alt="Thumbnail Video 2">
                            <div class="play-icon"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                        <div class="video-info"><div class="video-title">Manfaat Lidah Buaya...</div><div class="video-channel">Youtube Chanel</div></div>
                    </a>
                </div>
            </div>

            <hr class="section-divider">

             <!-- ===== Bagian Perkebunan Hidroponik ===== -->
            <div class="potensi-item-grid">
                <div>
                    <img src="{{ asset('images/potensi/hidroponik.jpg') }}" class="potensi-item-image" alt="Perkebunan Hidroponik" onerror="this.onerror=null;this.src='https://placehold.co/600x400/cccccc/333333?text=Hidroponik';">
                </div>
                <div class="potensi-item-text">
                    <h3>Perkebunan Hidroponik</h3>
                    <p>Untuk mengatasi keterbatasan lahan pekarangan, warga Jlegongan juga mengembangkan pertanian hidroponik...</p>
                    <a href="{{ route('potensi.show-hidroponik') }}" class="lihat-dokumentasi-button">Lihat Selengkapnya</a>
                </div>
            </div>
             <div class="video-terkait-container">
                <h4>Video terkait</h4>
                <div class="video-grid">
                    <a href="#" target="_blank" rel="noopener noreferrer" class="video-card">
                        <div class="video-thumbnail">
                            <img src="https://placehold.co/400x225/cccccc/333333?text=Video+3" alt="Thumbnail Video 3">
                            <div class="play-icon"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                        <div class="video-info"><div class="video-title">Memulai Bisnis Hidroponik...</div><div class="video-channel">Youtube Chanel</div></div>
                    </a>
                    <a href="#" target="_blank" rel="noopener noreferrer" class="video-card">
                         <div class="video-thumbnail">
                            <img src="https://placehold.co/400x225/cccccc/333333?text=Video+4" alt="Thumbnail Video 4">
                            <div class="play-icon"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                        <div class="video-info"><div class="video-title">Tips Sukses Bertani...</div><div class="video-channel">Youtube Chanel</div></div>
                    </a>
                </div>
            </div>
            
        </section>
    </div>

    {{-- Memberi jarak di bagian paling bawah halaman --}}
    <div style="margin-bottom: 6.4rem;"></div>

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
