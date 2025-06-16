{{-- /resources/views/potensi/show-pertanian.blade.php --}}

@extends('layouts.app')

@section('title', 'Detail Potensi Pertanian - Dusun Jlegongan')

@push('styles')
<style>
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
    /* PENJELASAN PERUBAHAN: Jarak bawah subjudul diperkecil */
    .detail-header .sub-judul {
        color: #114661;
        font-weight: 600;
        margin-bottom: 0.4rem; /* Diubah dari 0.8rem menjadi 0.4rem */
    }
    .detail-header .judul-utama {
        font-size: 4rem;
        font-weight: 800;
        color: #114661;
        line-height: 1.2;
    }

    /* === GAMBAR UTAMA === */
    /* PENJELASAN PERUBAHAN: Ukuran gambar utama diperkecil */
    .main-image-container {
        position: relative;
        border-radius: 1.6rem;
        overflow: hidden;
        max-height: 450px; /* Menetapkan tinggi maksimal untuk gambar */
    }
    .main-image-container img {
        width: 100%;
        height: 100%; /* Disesuaikan agar mengisi container */
        display: block;
        object-fit: cover; /* Memastikan gambar tetap proporsional */
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

    /* === HASIL KEGIATAN === */
    .hasil-kegiatan-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2.4rem;
    }
    .hasil-kegiatan-card {
        position: relative;
        border-radius: 1.2rem;
        overflow: hidden;
        color: white;
    }
    .hasil-kegiatan-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        aspect-ratio: 16/10;
        filter: brightness(0.7);
    }
    .hasil-kegiatan-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 1.6rem;
        background: linear-gradient(to top, rgba(17, 70, 97, 0.8) 10%, transparent 90%);
    }
    .hasil-kegiatan-overlay h4 {
        margin: 0;
        font-size: 1.8rem;
        font-weight: 600;
    }
    .hasil-kegiatan-overlay p {
        margin: 0.4rem 0 0 0;
        font-size: 1.4rem;
        opacity: 0.9;
    }

</style>
@endpush

@section('content')

    <div class="page-container">
        <section class="content-section">
            
            <!-- ===== Header Halaman Detail ===== -->
            <div class="detail-header">
                <p class="sub-judul">Pertanian Sawah</p>
                <h2 class="judul-utama">Sebagai sektor potensi utama Dusun Jlegongan</h2>
            </div>
            
            <!-- ===== Gambar Utama ===== -->
            <div class="main-image-container">
                <img src="{{ asset('images/potensi/pertanian-sawah-hero.jpg') }}" alt="Pemandangan Sawah di Jlegongan" onerror="this.onerror=null;this.src='https://placehold.co/1152x450/cccccc/333333?text=Gambar+Utama';">
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
                    Padukuhan Jlegongan, yang terletak di Kapanewon Seyegan, Kalurahan Margodadi, Kabupaten Sleman, memiliki potensi pertanian sawah yang menonjol dan terus berkembang. Lahan persawahan di wilayah ini memanfaatkan sumber daya air yang cukup serta pasokan air yang baik, menjadikannya lokasi yang ideal untuk budidaya padi. Keunggulan utama dari sektor ini adalah keberhasilan dalam mengintegrasikan perpaduan antara metode tradisional dan teknik pertanian modern, sehingga mampu meningkatkan produktivitas hasil panen.
                </p>
                <p>
                    Hasil panen padi dari sawah-sawah Jlegongan tidak hanya mencukupi kebutuhan pangan masyarakat setempat, tetapi juga turut menyuplai beras di wilayah Sleman dan sekitarnya. Dengan pengelolaan dan praktik pertanian yang baik secara turun-temurun, menjadikan pertanian sawah sebagai tulang punggung ekonomi sekaligus identitas agraris Padukuhan Jlegongan.
                </p>
                <p>
                    Menariknya, hingga kini masih terdapat beberapa upacara adat yang berkaitan dengan kegiatan pertanian, meskipun sudah jarang dilakukan. Salah satunya adalah wiwitan, sebuah upacara menandai awal masa tanam padi, dan angler, yang dilakukan setelah panen sawah melimpah. Kegiatan ini dianggap sebagai bentuk penghormatan terhadap alam dan harapan akan panen yang baik.
                </p>
            </div>

            <!-- ===== Dokumentasi Hasil Kegiatan ===== -->
            <div>
                <h3 class="detail-header" style="font-size: 2.8rem; text-align:center; margin-bottom: 2.4rem;">Hasil Kegiatan</h3>
                <div class="hasil-kegiatan-grid">
                    <div class="hasil-kegiatan-card">
                        <img src="{{ asset('images/potensi/hasil-1.jpg') }}" alt="Hasil Kegiatan 1" onerror="this.onerror=null;this.src='https://placehold.co/400x250/cccccc/333333?text=Hasil+1';">
                        <div class="hasil-kegiatan-overlay">
                            <h4>Hasil Kegiatan</h4>
                            <p>Dengan bibit padi pilihan diharapkan mampu meningkatkan...</p>
                        </div>
                    </div>
                    <div class="hasil-kegiatan-card">
                        <img src="{{ asset('images/potensi/hasil-2.jpg') }}" alt="Hasil Kegiatan 2" onerror="this.onerror=null;this.src='https://placehold.co/400x250/cccccc/333333?text=Hasil+2';">
                        <div class="hasil-kegiatan-overlay">
                            <h4>Hasil Kegiatan</h4>
                            <p>Dengan bibit padi pilihan diharapkan mampu meningkatkan...</p>
                        </div>
                    </div>
                    <div class="hasil-kegiatan-card">
                        <img src="{{ asset('images/potensi/hasil-3.jpg') }}" alt="Hasil Kegiatan 3" onerror="this.onerror=null;this.src='https://placehold.co/400x250/cccccc/333333?text=Hasil+3';">
                        <div class="hasil-kegiatan-overlay">
                            <h4>Hasil Kegiatan</h4>
                            <p>Dengan bibit padi pilihan diharapkan mampu meningkatkan...</p>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>

    {{-- Memberi jarak di bagian paling bawah halaman --}}
    <div style="margin-bottom: 6.4rem;"></div>

@endsection
