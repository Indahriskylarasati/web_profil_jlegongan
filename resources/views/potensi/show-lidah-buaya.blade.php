@extends('layouts.app')
@section('title', 'Detail Potensi Lidah Buaya - Dusun Jlegongan')
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/show-detail-lidahbuaya.css') }}">
<style>
    /* Style umum untuk halaman ini, dibuat konsisten dengan halaman lain */
    .page-container {
        max-width: 900px;
        margin: auto;
        padding: 0 2.4rem;
    }
    .content-section {
        padding: 4.8rem 0;
    }

    /* === HEADER HALAMAN DETAIL (PENYESUAIAN) === */
    .detail-header {
        text-align: left;
        margin-bottom: 2.5rem;
    }
    .detail-header .sub-judul {
        color:  #F5D364;
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }
    .detail-header .judul-utama {
        font-size: 2.8rem;
        font-weight: 700;
        color: #114661;
        line-height: 1.2;
    }

    /* === GAMBAR UTAMA (PENYESUAIAN DENGAN SLIDER) === */
    .main-image-container {
        position: relative;
        border-radius: 12px;
        overflow: hidden;
        width: 100%;
        height: 400px; /* PERUBAHAN: Ukuran gambar diperkecil */
        background-color: #e0e0e0;
    }
    .main-image-container .swiper,
    .main-image-container .swiper-wrapper,
    .main-image-container .swiper-slide {
        width: 100%;
        height: 100%;
    }
    .main-image-container img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;
    }

    /* Style untuk dot pagination Swiper */
    .main-image-container .swiper-pagination {
        bottom: 1.5rem !important;
    }
    .main-image-container .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
        background-color: white;
        opacity: 0.6;
        transition: all 0.3s ease;
    }
    .main-image-container .swiper-pagination-bullet-active {
        opacity: 1;
        background-color: #F5D364;
        width: 25px;
        border-radius: 5px;
    }

    /* === KONTEN DESKRIPSI (PENYESUAIAN) === */
    .description-content {
        padding: 3.2rem 0;
        font-size: 1.1rem;
        line-height: 1.8;
        color: #333;
    }
    .description-content p {
        margin-top: 0;
        margin-bottom: 1.5rem;
    }

    /* === VIDEO TERKAIT (PENYESUAIAN) === */
   .video-terkait-container {
        /* PERUBAHAN: Jarak atas diperkecil */
        margin-top: 2rem; 
    }
    .video-terkait-container h4 {
        font-size: 2rem;
        font-weight: 700;
        color: #114661;
        margin-bottom: 2.4rem;
    }
    
    .video-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2.4rem;
    }
    @media (min-width: 992px) {
        .video-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    .video-card {
        border-radius: 12px;
        overflow: hidden;
        background-color: #fff;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        text-decoration: none;
        color: inherit;
        display: block;
        transition: transform 0.3s ease;
    }
    .video-card:hover {
        transform: translateY(-5px);
    }
    .video-thumbnail {
        position: relative;
    }
    .video-thumbnail img {
        width: 100%;
        height: auto;
        aspect-ratio: 16/9;
        object-fit: cover;
        display: block;
    }
    .play-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 50px;
        height: 50px;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s;
    }
    .video-card:hover .play-icon {
        transform: translate(-50%, -50%) scale(1.1);
    }
    .play-icon svg {
        width: 24px;
        height: 24px;
        fill: #114661;
    }
    .video-info {
        padding: 1.6rem;
    }
    .video-title {
        font-size: 1.1em;
        font-weight: 600;
        color: #114661;
        margin: 0 0 0.8rem 0;
    }
    .video-channel {
        font-size: 0.9em;
        color: #52525b;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .video-channel .fa-youtube {
        color: red;
        font-size: 1.2em;
    }
</style>
@endpush

@section('content')

    <div class="page-container">
        <section class="content-section">
            
            <!-- ===== Header Halaman Detail ===== -->
            <div class="detail-header">
                <p class="sub-judul">Perkebunan Lidah Buaya</p>
                <h2 class="judul-utama">Inovasi argobisnis berkelanjutan dengan minim resiko</h2>
            </div>
            
            <!-- ===== Gambar Utama (Slider) ===== -->
            <div class="main-image-container">
                <div class="swiper main-image-swiper">
                    <div class="swiper-wrapper">
                        {{-- Ganti dengan gambar-gambar Lidah Buaya yang relevan --}}
                        <div class="swiper-slide">
                            <img src="{{ asset('images/potensi/lidahbuaya4.jpg') }}" alt="Perkebunan Lidah Buaya 1" onerror="this.onerror=null;this.src='https://placehold.co/1152x400/2a9d8f/ffffff?text=Gambar+1';">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('images/potensi/lidahbuaya2.jpg') }}" alt="Perkebunan Lidah Buaya 2" onerror="this.onerror=null;this.src='https://placehold.co/1152x400/2a9d8f/ffffff?text=Gambar+2';">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('images/potensi/lidahbuaya3.jpg') }}" alt="Perkebunan Lidah Buaya 3" onerror="this.onerror=null;this.src='https://placehold.co/1152x400/2a9d8f/ffffff?text=Gambar+3';">
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <!-- ===== Deskripsi Lengkap ===== -->
            <div class="description-content">
                <p>
                    Padukuhan Jlegongan, yang terletak di Kapanewon Seyegan, Kalurahan Margodadi, Kabupaten Sleman, memiliki potensi unggulan dalam bidang perkebunan lidah buaya (Aloe vera) yang dikembangkan oleh Bapak Marianto, seorang warga setempat. Usaha ini telah dirintis lebih dari lima tahun lalu sebagai bentuk inovasi pertanian berkelanjutan dengan perawatan yang sederhana namun bernilai ekonomi tinggi.
                </p>
                <p>
                    Bapak Marianto membudidayakan lidah buaya secara organik tanpa menggunakan pupuk kimia, hanya mengandalkan pupuk kandang kambing dan sekam padi sebagai media tanam. Varietas yang dikembangkan adalah Aloe vera chinensis yang dapat dimanfaatkan untuk produk kesehatan, kecantikan, dan bahan pangan seperti gel, teh kulit, sereal, hingga nata de aloe. Produk-produk tersebut telah dipasarkan ke berbagai supermarket besar seperti Superindo dan Carrefour, dan bahkan tengah dipersiapkan untuk ekspor.
                </p>
                <p>
                    Dengan sistem tanam cukup sekali dan panen berkelanjutan hingga 14-20 tahun, usaha Bapak Marianto menjadi contoh pertanian modern yang memanfaatkan serta mengedukasi generasi muda untuk terjun ke sektor agribisnis yang berkelanjutan.
                </p>
            </div>

            <!-- ===== Dokumentasi Video Terkait ===== -->
            <div class="video-terkait-container">
                <h4>Video terkait</h4>
                <div class="video-grid">
                    @php
                        // Data ini sebaiknya disiapkan di Controller
                        if (!isset($video_terkait_lidah_buaya)) {
                            $video_terkait_lidah_buaya = [
                                (object)['url' => 'https://youtu.be/eTeUZ9qaRZ8?si=cGoIL8mPAYjIN2j4', 'title' => 'Lidah Buaya Sekali Tanam Bisa Panen Selama 10 Tahun...', 'channel_name' => 'CapCapung'],
                                (object)['url' => 'https://youtu.be/RVD7uSKEWmo?si=4CuphKAagNzTlT-J', 'title' => 'BUDIDAYA LIDAH BUAYA SEKALI TANAM...', 'channel_name' => 'Ronarene VLOG'],
                                (object)['url' => 'https://youtu.be/iifP2hj0RXg?si=H2XFgMUrwDACzhv1','title' => 'Budidaya Lidah Buaya, Potensi Gagal Cuma 5%, Bisa Panen Terus Menerus','channel_name' => 'TVBisnis']
                            ];
                        }
                    @endphp
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

        </section>
    </div>
@endsection

@push('scripts')
{{-- Menambahkan script untuk Swiper.js --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mainImageSwiper = new Swiper('.main-image-swiper', {
            loop: true,
            effect: 'fade',
            fadeEffect: { crossFade: true },
            autoplay: {
                delay: 3500,
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
