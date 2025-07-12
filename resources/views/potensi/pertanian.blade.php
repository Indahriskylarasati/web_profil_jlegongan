@extends('layouts.app')
@section('title', 'Potensi Dusun - Dusun Jlegongan')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/potensi-pertanian.css') }}">
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
            {{-- Navigasi potensi pertanian --}}
            <a href="{{ route('potensi.pertanian') }}" class="sub-nav-button active">
                <i class="fa-solid fa-seedling"></i> Potensi Pertanian
            </a>
            
            {{-- Navigasi potensi umkm --}}
            <a href="{{ route('potensi.umkm') }}" class="sub-nav-button inactive">
                <i class="fa-solid fa-store"></i> Potensi UMKM
            </a>

            {{-- Navigasi potensi Masyarakat --}}
            <a href="{{ route('potensi.masyarakat') }}" class="sub-nav-button inactive">
                <i class="fa-solid fa-users"></i> Potensi Masyarakat
            </a>
        </nav>

        <section class="potensi-content-section">
            <!-- ===== Bagian Pertanian Sawah ===== -->
            <div class="potensi-item-grid">
                <div>
                    <img src="{{ asset('images/hero/WhatsApp Image 2025-06-26 at 16.39.14_0b450e07.jpg') }}" class="potensi-item-image" alt="Pertanian Sawah" onerror="this.onerror=null;this.src='https://placehold.co/600x400/cccccc/333333?text=Pertanian+Sawah';">
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
                    <p>Padukuhan Jlegongan, yang terletak di Kapanewon Seyegan, Kalurahan Margodadi, Kabupaten Sleman, memiliki potensi unggulan dalam bidang perkebunan lidah buaya (Aloe vera) yang dikembangkan oleh Bapak Marianto, seorang warga setempat. Usaha ini telah dirintis lebih dari lima tahun lalu sebagai bentuk inovasi pertanian berkelanjutan dengan perawatan yang sederhana namun bernilai ekonomi tinggi...</p>
                    <a href="{{ route('potensi.show-lidah-buaya') }}" class="lihat-dokumentasi-button">Lihat Selengkapnya</a>
                </div>
                <div>
                    <img src="{{ asset('images/potensi/lidah_buaya.jpg') }}" class="potensi-item-image" alt="Perkebunan Lidah Buaya" onerror="this.onerror=null;this.src='https://placehold.co/600x400/cccccc/333333?text=Lidah+Buaya';">
                </div>
            </div>

          <div class="video-terkait-container">
        <h4>Video terkait</h4>
        <div class="video-grid">
            @forelse($video_terkait_lidah_buaya as $video)
                @php
                    $video_id = '';
                    $url_parts = parse_url($video->url);
                    if (isset($url_parts['host']) && str_contains($url_parts['host'], 'youtu.be')) {
                        $video_id = ltrim($url_parts['path'], '/');
                    } elseif (isset($url_parts['query'])) {
                        parse_str($url_parts['query'], $query_params);
                        if (isset($query_params['v'])) { $video_id = $query_params['v']; }
                    }
                    $thumbnail_url = "https://img.youtube.com/vi/{$video_id}/hqdefault.jpg";
                @endphp
                <a href="{{ $video->url }}" target="_blank" rel="noopener noreferrer" class="video-card">
                    <div class="video-thumbnail">
                        <img src="{{ $thumbnail_url }}" alt="Thumbnail untuk {{ $video->title }}" onerror="this.onerror=null;this.src='https://placehold.co/400x225/cccccc/333333?text=Video';">
                        <div class="play-icon"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                    </div>
                    <div class="video-info">
                        <div class="video-title">{{ $video->title }}</div>
                            <div class="video-channel">
                                <i class="fa-brands fa-youtube"></i>
                                <span>{{ $video->channel_name }}</span>
                            </div>
                    </div>
                </a>
            @empty
                <p>Tidak ada video terkait untuk ditampilkan.</p>
            @endforelse
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
                    <p>Ibu Sri Fadhilah, seorang pelaku usaha hidroponik dari Margodadi, Sleman, terinspirasi untuk menekuni pertanian modern ini karena pesan mendalam tentang pentingnya peran generasi muda dalam dunia pertanian....</p>
                    <a href="{{ route('potensi.show-hidroponik') }}" class="lihat-dokumentasi-button">Lihat Selengkapnya</a>
                </div>
            </div>

            
            <!-- ===== Bagian untuk menampilkan video ===== -->
            <div class="video-terkait-container">
            <h4>Video terkait</h4>
            <div class="video-grid">
                @forelse($video_terkait_hidroponik as $video)
                    @php
                        $video_id = '';
                        $url_parts = parse_url($video->url);
                        if (isset($url_parts['host']) && str_contains($url_parts['host'], 'youtu.be')) {
                            $video_id = ltrim($url_parts['path'], '/');
                        } elseif (isset($url_parts['query'])) {
                            parse_str($url_parts['query'], $query_params);
                            if (isset($query_params['v'])) { $video_id = $query_params['v']; }
                        }
                        $thumbnail_url = "https://img.youtube.com/vi/{$video_id}/hqdefault.jpg";
                    @endphp
                    <a href="{{ $video->url }}" target="_blank" rel="noopener noreferrer" class="video-card">
                        <div class="video-thumbnail">
                            <img src="{{ $thumbnail_url }}" alt="Thumbnail untuk {{ $video->title }}" onerror="this.onerror=null;this.src='https://placehold.co/400x225/cccccc/333333?text=Video';">
                            <div class="play-icon"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                        <div class="video-info">
                            <div class="video-title">{{ $video->title }}</div>
                               <div class="video-channel">
                                    <i class="fa-brands fa-youtube"></i>
                                    <span>{{ $video->channel_name }}</span>
                                </div>
                        </div>
                    </a>
                @empty
                    <p>Tidak ada video terkait untuk ditampilkan.</p>
                @endforelse
            </div>
         </div>

    <div style="margin-bottom: 2.8rem;"></div>
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