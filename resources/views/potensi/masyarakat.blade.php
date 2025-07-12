@extends('layouts.app')
@section('title', 'Potensi Masyarakat - Dusun Jlegongan')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/potensi-masyarakat.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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
            {{-- navigasi potensi pertanian --}}
            <a href="{{ route('potensi.pertanian') }}" class="sub-nav-button inactive">
                <i class="fa-solid fa-seedling"></i> Potensi Pertanian
            </a>
            
            {{-- Navigasi potensi umkm --}}
            <a href="{{ route('potensi.umkm') }}" class="sub-nav-button inactive">
                <i class="fa-solid fa-store"></i> Potensi UMKM
            </a>

            {{-- Navigasi potensi Masyarakat --}}
            <a href="{{ route('potensi.masyarakat') }}" class="sub-nav-button active">
                <i class="fa-solid fa-users"></i> Potensi Masyarakat
            </a>
        </nav>

        <section class="potensi-content-section">
            {{-- ===== PEMUDA DUSUN SECTION ===== --}}
            <div class="potensi-item-grid">
                <div>
                    <img src="{{ asset('images/potensi/pemuda1.jpg') }}" class="potensi-item-image" alt="Pemuda Karang Taruna" onerror="this.onerror=null;this.src='https://placehold.co/600x400/cccccc/333333?text=Karang+Taruna';">
                </div>
                <div class="potensi-item-text">
                    <h3>Pemuda Dusun Jlegongan</h3>
                    <p>Generasi muda Jlegongan yang tergabung dalam Pemuda Jlegongan merupakan motor penggerak berbagai kegiatan positif, mulai dari acara 17 Agustus, Bank Sampah, hingga kegiatan masyarakat lainnya dalam membantu memudahkan urusan dalam masyarakat Dusun.</p>
                </div>
            </div>
            <div class="dokumentasi-section">
                <h3 class="dokumentasi-title">Dokumentasi Kegiatan Pemuda</h3>
                <div class="dokumentasi-grid">
                    <a href="#" class="dokumentasi-card">
                        <img src="{{ asset('images/potensi/pemuda1.jpg') }}" class="dokumentasi-image" alt="Dokumentasi 1" onerror="this.onerror=null;this.src='https://placehold.co/600x400/cccccc/333333?text=Foto+1';">
                        <div class="dokumentasi-overlay"><h4 class="dokumentasi-overlay-title">Rapat Rutin Pemuda</h4></div>
                    </a>
                    <a href="#" class="dokumentasi-card">
                        <img src="{{ asset('images/potensi/pemuda2.PNG') }}" class="dokumentasi-image" alt="Dokumentasi 2" onerror="this.onerror=null;this.src='https://placehold.co/600x400/cccccc/333333?text=Foto+2';">
                        <div class="dokumentasi-overlay"><h4 class="dokumentasi-overlay-title"></h4>Bank Sampah</div>
                    </a>
                    <a href="#" class="dokumentasi-card">
                        <img src="{{ asset('images/potensi/pemuda3.JPG') }}" class="dokumentasi-image" alt="Dokumentasi 3" onerror="this.onerror=null;this.src='https://placehold.co/600x400/cccccc/333333?text=Foto+3';">
                        <div class="dokumentasi-overlay"><h4 class="dokumentasi-overlay-title">Perayaan 17 Agustus</h4></div>
                    </a>
                </div>
            </div>

            <hr class="section-divider">

            {{-- =====IBU PKK SECTION ===== --}}
            <div class="potensi-item-grid">
                <div class="potensi-item-text">
                    <h3>Ibu-Ibu PKK</h3>
                    <p>Pembinaan Kesejahteraan Keluarga (PKK) menjadi wadah bagi para ibu untuk berkontribusi dalam pembangunan keluarga dan lingkungan. Program-program seperti arisan dan pelatihan keterampilan rutin diadakan dalam menunjang silaturahmi keakraban dan keterampilan warga.</p>
                </div>
                <div>
                    <img src="{{ asset('images/potensi/pkk2.jpg') }}" class="potensi-item-image" alt="Kegiatan PKK" onerror="this.onerror=null;this.src='https://placehold.co/600x400/cccccc/333333?text=Ibu-Ibu+PKK';">
                </div>
            </div>
            <div class="dokumentasi-section">
                <h3 class="dokumentasi-title">Dokumentasi Kegiatan PKK</h3>
                <div class="dokumentasi-grid">
                    <a href="#" class="dokumentasi-card">
                        <img src="{{ asset('images/potensi/pkk1.jpg') }}" class="dokumentasi-image" alt="Dokumentasi 1" onerror="this.onerror=null;this.src='https://placehold.co/600x400/cccccc/333333?text=Foto+1';">
                        <div class="dokumentasi-overlay"><h4 class="dokumentasi-overlay-title">Arisan Rutin PKK</h4></div>
                    </a>
                    <a href="#" class="dokumentasi-card">
                        <img src="{{ asset('images/potensi/pkk2.jpg') }}" class="dokumentasi-image" alt="Dokumentasi 2" onerror="this.onerror=null;this.src='https://placehold.co/600x400/cccccc/333333?text=Foto+2';">
                        <div class="dokumentasi-overlay"><h4 class="dokumentasi-overlay-title">Sosialisasi Desain Packaging</h4></div>
                    </a>
                    <a href="#" class="dokumentasi-card">
                        <img src="{{ asset('images/potensi/pkk3.jpg') }}" class="dokumentasi-image" alt="Dokumentasi 3" onerror="this.onerror=null;this.src='https://placehold.co/600x400/cccccc/333333?text=Foto+3';">
                        <div class="dokumentasi-overlay"><h4 class="dokumentasi-overlay-title">Pelatihan Pengolahan Lidah Buaya</h4></div>
                    </a>
                </div>
            </div>

            <hr class="section-divider">

            {{-- ===== KWT SECTION ===== --}}
            <div class="potensi-item-grid">
                <div>
                    <img src="{{ asset('images/potensi/hidroponik1.jpg') }}" class="potensi-item-image" alt="Kegiatan KWT" onerror="this.onerror=null;this.src='https://placehold.co/600x400/cccccc/333333?text=Kegiatan+KWT';">
                </div>
                <div class="potensi-item-text">
                    <h3>Kelompok Wanita Tani (KWT)</h3>
                    <p>Kelompok Wanita Tani (KWT) menjadi ujung tombak dalam inovasi produk olahan hasil pertanian. Melalui KWT, para wanita berdaya secara ekonomi dengan mengolah hasil kebun menjadi produk bernilai jual.</p>
                </div>
            </div>
            
        </section>
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