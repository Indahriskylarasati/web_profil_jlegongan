{{-- /resources/views/profil_dusun/index.blade.php --}}

{{-- PENJELASAN: Memakai kerangka utama (header, footer, dll) dari file layouts/app.blade.php --}}
@extends('layouts.app')

{{-- PENJELASAN: Mengirimkan judul spesifik untuk halaman ini ke kerangka utama --}}
@section('title', 'Profil Dusun - Dusun Jlegongan')

{{-- PENJELASAN: "Kantong" untuk menampung semua CSS yang hanya berlaku untuk halaman ini --}}
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        /* === STRUKTUR & PEMISAH (Satuan Umum) === */
        /* PENJELASAN: Container utama untuk membungkus konten agar tidak terlalu lebar di layar besar */
        .page-container {
            max-width: 1100px; /* Lebar maksimum konten */
            margin: auto; /* Posisi di tengah */
            padding: 0 2.4rem; /* Jarak kiri-kanan 24px */
        }
        /* PENJELASAN: Garis pemisah antar bagian/seksi */
        .section-divider {
            border: 0;
            height: 1px;
            background-color:rgb(64, 92, 120); /* Warna garis */
            margin: 6.4rem 0; /* Jarak atas-bawah 64px */
        }
        /* PENJELASAN: Judul utama setiap bagian (seperti "Potensi", "Peta Lokasi") */
        .section-title {
            font-size: 3.2rem; /* 32px */
            font-weight: 700;
            color: #114661; /* Ganti warna judul di sini */
            text-align: left; /* Perataan teks judul */
            margin-bottom: 2.6rem; /* Jarak ke subjudul di bawahnya (16px) */
        }
        /* PENJELASAN: Subjudul di bawah judul utama */
        .section-subtitle {
            font-size: 1.6rem; /* 16px */
            text-align: left;
            color: #52525b; /* Ganti warna subjudul di sini */
            margin-top: -1.6rem; /* Jarak negatif agar lebih dekat dengan judul utama */
            margin-bottom: 3.2rem; /* Jarak ke konten di bawahnya (32px) */
            max-width: 600px;
        }

        /* === HERO SECTION (Satuan 2) === */
        .hero-section-container { padding: 2.4rem; /* 24px */ }
        .hero-section {
            position: relative;
            height: 45vh; /* Tinggi 70% dari tinggi layar */
            min-height: 350px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
            overflow: hidden;
            border-radius: 2.4rem; /* Sudut melingkar 24px */

     
        }
        .swiper { width: 100%; height: 100%; position: absolute; top: 0; left: 0; z-index: 1; }
        .swiper-slide img { display: block; width: 100%; height: 100%; object-fit: cover; filter: brightness(0.55); /* Gelapkan gambar agar teks terbaca */ }
        .hero-content {
            position: relative;
            z-index: 10;
            text-align: center;
            padding: 2rem 4rem; /* 20px & 40px */
            max-width: 80rem; /* 800px */
            text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.6); /* Bayangan teks */
        }

        .hero-subjudul {font-size: 2.4rem; /* 36px */ font-weight: 600; line-height: 1.2; margin-bottom: 0.8rem; /* 8px */ }
        .hero-judul-utama { font-size: 3.2rem; /* 36px */ font-weight: 750; line-height: 1.2; margin-bottom: 0.8rem; /* 8px */ }
        .hero-deskripsi { font-size: 1.6rem; /* 16px */ font-weight: 400; line-height: 1.7; opacity: 0.9; max-width: 60rem; /* 600px */ margin: auto; }
        @media (min-width: 300px) { .hero-judul-utama { font-size: 3.2rem; /* 48px */ } }
        .hero-section .swiper-pagination { bottom: 2rem; /* 20px */ }
        .hero-section .swiper-pagination-bullet { width: 1rem; /* 10px */ height: 1rem; /* 10px */ background-color: #F5D364; opacity: 0.7; transition: all 0.3s ease; margin: 0 0.5rem !important; /* 5px */ }
        .hero-section .swiper-pagination-bullet-active { background-color: #114661; width: 2.5rem; /* 25px */ border-radius: 0.5rem; /* 5px */ opacity: 1; }

        /* === DESKRIPSI SECTION (Satuan 3) === */
        .deskripsi-section { background-color: #114661; color: white; padding: 4.8rem; /* 48px */ border-radius: 2.4rem; /* 24px */ text-align: center; margin-top: 6.4rem; /* 64px */ }
        .deskripsi-section h2 { font-size: 3.2rem; /* 32px */ font-weight: 800; margin-top: 0; margin-bottom: 1.6rem; /* 16px */ }
        .deskripsi-section p { font-size: 1.6rem; /* 16px */ line-height: 1.7; opacity: 0.85; margin: 0; }

        /* === SAMBUTAN SECTION (Satuan 4) === */
        .sambutan-grid { display: grid; grid-template-columns: 1fr; gap: 3.2rem; /* 32px */ align-items: center; }
        @media(min-width: 768px) { .sambutan-grid { grid-template-columns: 1fr 2fr; gap: 4.8rem; /* 48px */ } }
        .sambutan-foto-card { position: relative; max-width: 280px; width: 100%; margin: auto; border-radius: 1.6rem; /* 16px */ overflow: hidden; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04); color: white; }
        .sambutan-foto-card img { width: 100%; height: auto; aspect-ratio: 4 / 5; object-fit: cover; display: block; }
        .sambutan-foto-overlay { position: absolute; bottom: 0; left: 0; right: 0; text-align: center; padding: 4rem 1.6rem 2rem; background: linear-gradient(to top, #114661 10%, transparent 90%); }
        .sambutan-foto-nama { font-size: 1.8rem; /* 18px */ font-weight: 600; }
        .sambutan-foto-jabatan { font-size: 1.4rem; /* 14px */ opacity: 0.8; }
        .sambutan-teks { max-height: 350px; overflow-y: auto; padding-right: 1rem; /* 10px */ }
        .sambutan-teks h2 { font-size: 3.2rem; /* 32px */ font-weight: 700; margin-top: 0; margin-bottom: 1.6rem; /* 16px */ }
        .sambutan-teks p { font-size: 1.6rem; /* 16px */ line-height: 1.8; margin-bottom: 1.6rem; /* 16px */ }
        .sambutan-teks .keterangan-kadus { margin-top: 2.4rem; /* 24px */ font-style: italic; opacity: 0.9; }

        /* === POTENSI SECTION (Satuan 5) === */
        .potensi-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2.4rem; /* 24px */ }
        .potensi-card { background-color:#f0f0f0; border-radius: 1.6rem; /* 16px */ padding: 2.4rem; /* 24px */ text-align: center; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06); transition: transform 0.3s, box-shadow 0.3s; }
        .potensi-card:hover { transform: translateY(-5px); box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05); }
        .potensi-card h3 { font-size: 2rem; /* 20px */ font-weight: 600; color: #114661; margin-top: 1.6rem; /* 16px */ margin-bottom: 0.8rem; /* 8px */ }
        .potensi-card p { font-size: 1.4rem; /* 14px */ line-height: 1.6; opacity: 0.8; margin: 0; }
        .potensi-icon { width: 64px; height: 64px; }

        /* === PETA SECTION (Satuan 6) === */
        .peta-iframe { width: 100%; height: 500px; border:0; border-radius: 1.6rem; /* 16px */ filter: grayscale(0.3); }

        /* === STOK SECTION (Satuan 7) === */
        .stok-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2.4rem; /* 24px */ justify-items: center; align-items: start; }
        @media (min-width: 992px) { .stok-grid { grid-template-columns: repeat(4, 1fr); } }
        .stok-card { position: relative; width: 100%; border-radius: 1.6rem; /* 16px */ overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06); color: white; }
        .stok-card img { width: 100%; height: auto; aspect-ratio: 4 / 5; object-fit: cover; display: block; }
        .stok-card-overlay { position: absolute; bottom: 0; left: 0; right: 0; text-align: center; padding: 3rem 1.6rem 1.5rem; /* 30px, 16px, 15px */ background: linear-gradient(to top, rgba(17, 70, 97, 0.9) 10%, transparent 90%); }
        .stok-nama { font-size: 1.6rem; /* 16px */ font-weight: 600; }
        .stok-jabatan { font-size: 1.3rem; /* 13px */ opacity: 0.8; }
        .stok-link-container { display: flex; flex-direction: column; justify-content: center; align-items: center; background-color: #; padding: 2rem; /* 20px */ border-radius: 1.6rem; /* 16px */ height: 100%; text-align: center; min-height: 280px; }
        .stok-link-container p { font-size: 1.8rem; /* 18px */ font-weight: 600; color: #114661; margin: 0 0 1.2rem 0; /* 12px */ }
        .stok-button { background-color: #F5D364; color: #181823;; padding: 1.2rem 2.4rem; /* 12px & 24px */ border-radius: 0.8rem; /* 8px */ text-decoration: none; font-weight: 700; transition: background-color 0.3s; display: inline-block; }
        .stok-button:hover { background-color:  #ECF3F6;; }
    </style>
@endpush

@section('content')
    <!-- ===== SATUAN 2: HERO SECTION ===== -->
    <div class="hero-section-container">
        <section class="hero-section">
            <div class="swiper hero-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{ asset('images/hero/alam1.jpg') }}" alt="Pemandangan Dusun 1" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/2E3A87/FFFFFF?text=Gambar+1+Tidak+Ditemukan';"></div>
                    <div class="swiper-slide"><img src="{{ asset('images/hero/alam2.jpg') }}" alt="Aktivitas Warga Dusun" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/4A55A2/FFFFFF?text=Gambar+2+Tidak+Ditemukan';"></div>
                    <div class="swiper-slide"><img src="{{ asset('images/hero/alam3.jpg') }}" alt="Potensi Alam Dusun" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/7895CB/FFFFFF?text=Gambar+3+Tidak+Ditemukan';"></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="hero-content">
                <p class="hero-subjudul">Selamat Datang</p>
                <h1 class="hero-judul-utama">Website profil Dusun Jlegongan</h1>
                <p class="hero-deskripsi">Kami hadir untuk memperkenalkan potensi, kegaran, dan kehidupan masyarakat Dusun Jlegongan kepada Anda. Jelajahi informasi dan temukan cerita kami di sini.</p>
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
                <img src="\images\pengurus\kepaladusun.jpg" alt="Foto Bambang Wijanarka">
                <div class="sambutan-foto-overlay">
                    <div class="sambutan-foto-nama">Bambang Wijanarka</div>
                    <div class="sambutan-foto-jabatan">Kepala Dusun</div>
                </div>
            </div>
            <div class="sambutan-teks">
                <h2>Sambutan Kepala Dusun</h2>
                <p>Salam sejahtera untuk kita semua, Dengan penuh rasa syukur, kami persembahkan website resmi Dusun Jlegongan...</p>
                <p>Melalui website ini, kami berharap segala potensi yang ada dapat dikenal lebih luas...</p>
                <div class="keterangan-kadus"><strong>Bambang Wijanarka</strong><br>Kepala Dusun Jlegongan</div>
            </div>
        </section>
        
        <hr class="section-divider">
        
        <!-- ===== SATUAN 5: POTENSI ===== -->
        <section>
            <h2 class="section-title">Potensi Dusun Jlegongan</h2>
            <p class="section-subtitle">Potensi sumber daya alam dan manusia sebagai penunjang perekonomian Dusun Jlegongan</p>
            <div class="potensi-grid">
                {{-- PENJELASAN: Memanggil komponen potensi-card yang ada di /resources/views/components/potensi-card.blade.php --}}
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
                {{-- PENJELASAN: Ganti URL src di bawah ini dengan link "Embed a map" dari Google Maps --}}
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.538562761895!2d110.27737097584518!3d-7.732439192275211!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7af68b3226c55d%3A0x642fb049bf88d6d8!2sPerpustakaan%20Umum%20Dusun%20Jlegongan!5e0!3m2!1sid!2sid!4v1718051610472!5m2!1sid!2sid" class="peta-iframe" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="peta-iframe" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
        
        <hr class="section-divider">

        <!-- ===== SATUAN 7: STOK (STRUKTUR PENGURUS) ===== -->
        <section>
            <h2 class="section-title">STOK</h2>
            <p class="section-subtitle">Struktur Organisasi dan Tata Kerja Dusun Jlegongan</p>
            <div class="stok-grid">
                
                {{-- PENJELASAN: Looping untuk menampilkan 3 pengurus pertama dari database --}}
                @foreach($pratinjauPengurus as $pengurus)
                <div class="stok-card">
                    <img src="{{ asset('images/pengurus/' . $pengurus->foto) }}" alt="Foto {{ $pengurus->nama }}" onerror="this.onerror=null;this.src='https://placehold.co/400x500/cccccc/333333?text=Foto';">
                    <div class="stok-card-overlay">
                        <div class="stok-nama">{{ $pengurus->nama }}</div>
                        <div class="stok-jabatan">{{ $pengurus->jabatan }}</div>
                    </div>
                </div>
                @endforeach
                 
                <div class="stok-link-container">
                    <p>Ingin Kenal Lebih Lanjut?</p>
                    {{-- PENJELASAN: Tombol ini mengarah ke rute yang bernama 'struktur-organisasi.index' --}}
                    <a href="{{ route('pengurus.index') }}" class="stok-button">Silahkan klik disini !</a>
                </div>
            </div>
        </section>
        
        {{-- Memberi jarak di bagian paling bawah halaman --}}
        <div style="margin-bottom: 6.4rem;"></div>
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
