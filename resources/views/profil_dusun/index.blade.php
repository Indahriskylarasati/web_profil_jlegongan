@extends('layouts.app')
@section('title', 'Profil Dusun - Dusun Jlegongan')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/profil-dusun.css') }}">
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
                    <div class="swiper-slide"><img src="{{ asset('images/hero/WhatsApp Image 2025-06-26 at 16.39.14_ca086480.jpg') }}" alt="Pemandangan Dusun 1" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/2E3A87/FFFFFF?text=Gambar+1+Tidak+Ditemukan';"></div>
                    <div class="swiper-slide"><img src="{{ asset('images/hero/WhatsApp Image 2025-06-26 at 16.39.14_4375e95f.jpg') }}" alt="Aktivitas Warga Dusun" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/4A55A2/FFFFFF?text=Gambar+2+Tidak+Ditemukan';"></div>
                    <div class="swiper-slide"><img src="{{ asset('images/hero/WhatsApp Image 2025-06-26 at 16.39.14_0b450e07.jpg') }}" alt="Potensi Alam Dusun" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/7895CB/FFFFFF?text=Gambar+3+Tidak+Ditemukan';"></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="hero-content">
                <h1>Selamat Datang</h1>
                <h2>Website profil Dusun Jlegongan</h2>
                <p>Kami hadir untuk memperkenalkan potensi, kegaran, dan kehidupan masyarakat Dusun Jlegongan kepada Anda. Jelajahi informasi dan temukan cerita kami di sini.</p>
            </div>
        </section>
    </div>

    <!-- ===== KONTEN UTAMA HALAMAN ===== -->
    <div class="page-container">
        
        <!-- ===== SATUAN 3: DESKRIPSI ===== -->
        <section class="deskripsi-section">
            <h2>Deskripsi</h2>
            <p>Dusun Jlegongan merupakan salah satu dusun di Kelurahan Margodadi, Kecamatan Seyegan, Kabupaten Sleman, Yogyakarta. Dusun ini memiliki potensi utama di bidang pertanian yang menjadi 
                mata pencaharian sebagian besar warganya. Selain itu, berkembang pula berbagai UMKM seperti peternakan lele, olahan makanan, sayur hidroponik, hingga produk herbal dari lidah buaya. 
                Potensi ini didukung oleh kegiatan sosial kemasyarakatan melalui program PKK, KWT, posyandu, serta komunitas pemuda yang aktif. Perpaduan antara sumber daya alam dan sumber daya manusia 
                ini menjadikan Dusun Jlegongan berpeluang besar untuk dikembangkan secara lebih luas.</p>
        </section>

        <hr class="section-divider">

        <!-- ===== SATUAN 4: SAMBUTAN ===== -->
        <section class="sambutan-grid">
            <div class="sambutan-foto-card">
                <img src="\images\pengurus\Gemini_Generated_Image_ckfwhwckfwhwckfw.png" alt="Foto Bambang Wijanarka">
                <div class="sambutan-foto-overlay">
                    <div class="sambutan-foto-nama">Bambang Wijanarka</div>
                    <div class="sambutan-foto-jabatan">Kepala Dusun</div>
                </div>
            </div>
            <div class="sambutan-teks">
                <h2>Sambutan Kepala Dusun</h2>
                <p>Sambutan Belum Tersedia...</p>
                <p>Menunggu Konfirmasi...</p>
                <div class="keterangan-kadus"><strong>Bambang Wijanarka</strong><br>Kepala Dusun Jlegongan</div>
            </div>
        </section>
        
        <hr class="section-divider">
        
        <!-- ===== SATUAN 5: POTENSI ===== -->
        <section>
            <h2 class="section-title">Potensi Dusun Jlegongan</h2>
            <p class="section-subtitle"> Potensi sumber daya alam dan manusia sebagai penunjang perekonomian Dusun Jlegongan </p>
            <div class="potensi-grid">
                <x-potensi-card icon="pertanian.png" title="Potensi Pertanian" description="Pertanian sebagai potensi perekonomian utama Dusun Jlegongan." />
                <x-potensi-card icon="umkm.png" title="Potensi UMKM" description="Beragam UMKM berkembang menjadi tumpuan pendapatan tambahan bagi warga." />
                <x-potensi-card icon="masyarakat.png" title="Potensi Masyarakat" description="Warga yang aktif dan guyub dalam berbagai kegiatan sosial." />
            </div>
        </section>
        
        <hr class="section-divider">
        
        <!-- ===== SATUAN 6: PETA LOKASI ===== -->
        <section>
            <h2 class="section-title">Peta Lokasi</h2>
            <p class="section-subtitle">Menampilkan Peta wilayah Dusun Jlegongan</p>
            <div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.538562761895!2d110.27737097584518!3d-7.732439192275211!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7af68b3226c55d%3A0x642fb049bf88d6d8!2sPerpustakaan%20Umum%20Dusun%20Jlegongan!5e0!3m2!1sid!2sid!4v1718051610472!5m2!1sid!2sid" class="peta-iframe" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="peta-iframe" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
        
        <hr class="section-divider">

        <!-- ===== SATUAN 7: STOK (STRUKTUR PENGURUS) ===== -->
        <section>
            <h2 class="section-title">STOK</h2>
            <p class="section-subtitle">Struktur Organisasi dan Tata Kerja Dusun Jlegongan</p>
            <div class="stok-grid">
                {{-- menampilkan 3 pengurus pertama dari database --}}
                @foreach($pratinjauPengurus as $pengurus)
                <div class="stok-card">
                    <img src="{{ asset('storage/' . $pengurus->foto) }}" alt="Foto {{ $pengurus->nama }}" class="profile-card-image">
                    <div class="stok-card-overlay">
                        <div class="stok-nama">{{ $pengurus->nama }}</div>
                        <div class="stok-jabatan">{{ $pengurus->jabatan }}</div>
                    </div>
                </div>
                @endforeach
                 
                <div class="stok-link-container">
                    <p>Ingin Kenal Lebih Lanjut?</p>
                    <a href="{{ route('pengurus.index') }}" class="stok-button">Silahkan klik disini !</a>
                </div>
            </div>
        </section>
        
        {{-- JARAK SECTION AKHIR DENGAN FOOTHER --}}
        <div style="margin-bottom: 5.4rem;"></div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const heroSwiper = new Swiper('.hero-swiper', {
                loop: true, effect: 'fade', fadeEffect: { crossFade: true },
                autoplay: { delay: 4000, disableOnInteraction: false },
                pagination: { el: '.swiper-pagination', clickable: true }
            });
        });
    </script>
@endpush
