@extends('layouts.app')
@section('title', 'Detail Potensi Pertanian - Dusun Jlegongan')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/show-detail-pertanian.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush

@section('content')

    <div class="page-container">
        <section class="content-section">
            
            <!-- ===== Header Halaman Detail ===== -->
            <div class="detail-header">
                <p class="sub-judul">Pertanian Sawah</p>
                <h2 class="judul-utama">Sebagai Sektor Potensi Utama Dusun Jlegongan</h2>
            </div>
         
            <div class="main-image-container">
                <div class="swiper main-image-swiper">
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <img src="{{ asset('images/hero/WhatsApp Image 2025-06-26 at 16.39.14_ca086480.jpg') }}" alt="Pemandangan Sawah 1" onerror="this.onerror=null;this.src='https://placehold.co/1152x400/cccccc/333333?text=Gambar+1';">
                        </div>
                        <div class="swiper-slide">
                             <img src="{{ asset('images/hero/WhatsApp Image 2025-06-26 at 16.39.14_88b25364.jpg') }}" alt="Pemandangan Sawah 2" onerror="this.onerror=null;this.src='https://placehold.co/1152x400/cccccc/333333?text=Gambar+2';">
                        </div>
                        <div class="swiper-slide">
                             <img src="{{ asset('images/hero/WhatsApp Image 2025-06-26 at 16.39.14_42e69d76.jpg') }}" alt="Pemandangan Sawah 3" onerror="this.onerror=null;this.src='https://placehold.co/1152x400/cccccc/333333?text=Gambar+3';">
                        </div>
                    </div>
                    <!-- Pagination (dot) -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <!-- ===== Deskripsi ===== -->
            <div class="description-content">
                <p>
                    Padukuhan Jlegongan, yang terletak di Kapanewon Seyegan, Kalurahan Margodadi, Kabupaten Sleman, memiliki potensi pertanian sawah yang menonjol dan terus berkembang. Lahan persawahan di wilayah ini memanfaatkan sumber daya air yang cukup serta pasokan air yang baik, menjadikannya lokasi yang ideal untuk budidaya padi. Keunggulan utama dari sektor ini adalah keberhasilan dalam mengintegrasikan perpaduan antara metode tradisional dan teknik pertanian modern, sehingga mampu meningkatkan produktivitas hasil panen.
                </p>
                <p>
                    Hasil panen padi dari sawah-sawah Jlegongan tidak hanya mencukupi kebutuhan pangan masyarakat setempat, tetapi juga turut menyuplai beras di wilayah Sleman dan sekitarnya. Dengan pengelolaan dan praktik pertanian yang baik secara turun-temurun, menjadikan pertanian sawah sebagai tulang punggung ekonomi sekaligus identitas agraris Padukuhan Jlegongan.
                </p>
                <p>
                    Menariknya, hingga kini masih terdapat beberapa upacara adat yang berkaitan dengan kegiatan pertanian, meskipun sudah jarang dilakukan. Salah satunya adalah wiwit, upacara yang menandai awal masa tanam padi, dan angler, yang dilakukan setelah tanah sawah selesai digarap dan sebelum padi ditanam, sebagai bentuk penghormatan terhadap alam dan harapan atas hasil panen yang baik
                </p>
            </div>
        </section>
    </div>

@endsection

@push('scripts')
{{--Link ke Swiper.js JavaScript --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mainImageSwiper = new Swiper('.main-image-swiper', {
            loop: true, 
            effect: 'fade', 
            fadeEffect: {
                crossFade: true
            },
            autoplay: {
                delay: 3000, 
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
