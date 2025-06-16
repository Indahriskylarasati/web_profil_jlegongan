{{-- /resources/views/potensi/show-lidah-buaya.blade.php --}}

@extends('layouts.app')

@section('title', 'Detail Potensi Lidah Buaya - Dusun Jlegongan')

@push('styles')
<style>
    /* Style di halaman ini sama dengan halaman show-pertanian, agar konsisten */
    .page-container {
        max-width: 1152px;
        margin: auto;
        padding: 0 2.4rem;
    }
    .content-section {
        padding: 4.8rem 0;
    }

    /* === HEADER HALAMAN DETAIL === */
    .detail-header {
        text-align: left;
        margin-bottom: 3.2rem;
    }
    .detail-header .sub-judul {
        color: #114661;
        font-weight: 600;
        margin-bottom: 0.4rem;
    }
    .detail-header .judul-utama {
        font-size: 4rem;
        font-weight: 800;
        color: #114661;
        line-height: 1.2;
    }

    /* === GAMBAR UTAMA === */
    .main-image-container {
        position: relative;
        border-radius: 1.6rem;
        overflow: hidden;
        max-height: 450px;
    }
    .main-image-container img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;
    }
    .main-image-pagination {
        position: absolute;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 0.8rem;
    }
    .pagination-dot {
        width: 1rem;
        height: 1rem;
        border-radius: 50%;
        background-color: white;
        opacity: 0.5;
    }
    .pagination-dot.active {
        opacity: 1;
    }

    /* === KONTEN DESKRIPSI === */
    .description-content {
        padding: 3.2rem 0;
        font-size: 1.6rem;
        line-height: 1.8;
        color: #333;
    }
    .description-content p {
        margin-bottom: 1.6rem;
    }

    /* === VIDEO TERKAIT === */
    .video-terkait-container { margin-top: 3.2rem; }
    .video-terkait-container h4 { font-size: 2.8rem; font-weight: 700; color: #114661; margin-bottom: 2.4rem; }
    .video-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2.4rem;
    }
    @media (min-width: 992px) {
        .video-grid {
            grid-template-columns: repeat(2, 1fr); /* Dibuat 2 kolom agar lebih besar */
        }
    }
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

    <div class="page-container">
        <section class="content-section">
            
            <!-- ===== Header Halaman Detail ===== -->
            <div class="detail-header">
                <p class="sub-judul">Perkebunan Lidah Buaya</p>
                <h2 class="judul-utama">Inovasi argobisnis berkelanjutan dengan minim resiko</h2>
            </div>
            
            <!-- ===== Gambar Utama ===== -->
            <div class="main-image-container">
                <img src="{{ asset('images/potensi/lidah-buaya-hero.jpg') }}" alt="Perkebunan Lidah Buaya di Jlegongan" onerror="this.onerror=null;this.src='https://placehold.co/1152x450/cccccc/333333?text=Gambar+Utama';">
                {{-- Paginasi (jika nanti dibuat slider) --}}
                <div class="main-image-pagination">
                    <span class="pagination-dot active"></span>
                    <span class="pagination-dot"></span>
                    <span class="pagination-dot"></span>
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
            <div>
                <h3 class="video-terkait-container">Video terkait</h3>
                <div class="video-grid">
                    {{-- PENJELASAN PERUBAHAN: Ganti tanda # dengan link YouTube yang relevan --}}
                    <a href="https://www.youtube.com/watch?v=xxxxxxxx" target="_blank" rel="noopener noreferrer" class="video-card">
                        <div class="video-thumbnail">
                            <img src="{{ asset('images/potensi/video-lidah-buaya-1.jpg') }}" alt="Thumbnail Video 1" onerror="this.onerror=null;this.src='https://placehold.co/400x225/cccccc/333333?text=Video+1';">
                            <div class="play-icon"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                        <div class="video-info"><div class="video-title">Budidaya Lidah Buaya, Prospek Gagal Cuma 5%...</div><div class="video-channel">Youtube Chanel</div></div>
                    </a>
                    <a href="https://www.youtube.com/watch?v=yyyyyyyy" target="_blank" rel="noopener noreferrer" class="video-card">
                         <div class="video-thumbnail">
                            <img src="{{ asset('images/potensi/video-lidah-buaya-2.jpg') }}" alt="Thumbnail Video 2" onerror="this.onerror=null;this.src='https://placehold.co/400x225/cccccc/333333?text=Video+2';">
                            <div class="play-icon"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                        <div class="video-info"><div class="video-title">Cara Budidaya Lidah Buaya Untuk Kesehatan dan R...</div><div class="video-channel">Youtube Chanel</div></div>
                    </a>
                </div>
            </div>

        </section>
    </div>

    {{-- Memberi jarak di bagian paling bawah halaman --}}
    <div style="margin-bottom: 6.4rem;"></div>

@endsection
