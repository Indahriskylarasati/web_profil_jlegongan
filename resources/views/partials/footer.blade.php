{{-- 
    PENJELASAN FILE: partials/footer.blade.php
    File ini hanya berisi kode untuk bagian footer (kaki halaman) website.
    File ini dipanggil oleh file kerangka utama (layouts/app.blade.php) 
    menggunakan @include('partials.footer').
--}}


{{-- CSS KHUSUS UNTUK FOOTER --}}
<style>
    /*
     * KELAS .footer-container
     * Ini adalah pembungkus utama seluruh area footer.
     * Anda bisa mengubah warna latar belakang, warna teks, dan jarak di sini.
    */
    .footer-container {
        background-color: #114661; /* Ganti kode hex ini untuk mengubah warna latar footer */
        color: #FFFFFF; /* Warna teks default di dalam footer */
        /* PENJELASAN PERUBAHAN: Padding bawah dikurangi menjadi 3.2rem (32px) */
        padding: 4.8rem 4rem 3.2rem; /* Jarak atas 48px, kiri-kanan 40px, bawah 32px */
        margin-top: 6.4rem; /* Jarak footer dari konten di atasnya */
    }

    /*
     * KELAS .footer-content
     * Ini adalah container yang membungkus semua konten di dalam footer
     * agar lebarnya tidak berlebihan di layar besar dan posisinya di tengah.
    */
    .footer-content {
        max-width: 1152px; /* Lebar maksimum konten */
        margin: auto; /* Membuat container berada di tengah */
    }

    /*
     * KELAS .footer-top
     * Ini adalah bagian atas footer yang berisi judul utama dan alamat.
    */
    .footer-top {
        padding-bottom: 2.4rem; /* Jarak ke garis pemisah */
    }
    .footer-judul-utama {
        font-size: 2.4rem; /* 24px */
        font-weight: 700; /* Ketebalan font */
        margin: 0 0 0.8rem 0; /* Jarak atas, kanan, bawah, kiri */
    }
    .footer-alamat {
        font-size: 1.6rem; /* 16px */
        font-weight: 400;
        margin: 0;
        opacity: 0.8;
    }

    /*
     * KELAS .footer-divider
     * Ini adalah garis pemisah antara bagian atas dan bawah footer.
    */
    .footer-divider {
        border: none;
        height: 1px;
        background-color: rgba(255, 255, 255, 0.2);
        margin: 0;
    }

    /*
     * KELAS .footer-bottom
     * Ini adalah bagian bawah footer yang berisi kontak dan link navigasi.
     * Kita menggunakan flexbox untuk mensejajarkannya.
    */
    .footer-bottom {
        display: flex;
        flex-wrap: wrap; /* Izinkan wrap di layar kecil */
        justify-content: space-between; /* Mendorong kontak ke kiri & navigasi ke kanan */
        align-items: flex-start; /* Konten rata atas */
        padding-top: 2.4rem; /* Jarak dari garis pemisah */
        gap: 3.2rem; /* Jarak jika terjadi wrap */
    }

    /*
     * KELAS .footer-kontak
     * Bagian kiri yang berisi email.
    */
    .footer-kontak .footer-link {
        font-weight: 500;
    }

    /*
     * KELAS .footer-nav-group
     * Bagian kanan yang berisi grup-grup link.
     * Kita gunakan flexbox lagi agar grup link tersusun rapi.
    */
    .footer-nav-group {
        display: flex;
        flex-wrap: wrap;
        gap: 4rem; /* Jarak antar grup link (Potensi, Program, Profil) */
    }
    .footer-nav-kolom h4 {
        font-size: 1.8rem; /* 18px */
        font-weight: 600;
        margin: 0 0 1.6rem 0;
    }
    
    /*
     * KELAS .footer-link
     * Ini adalah style untuk setiap link.
    */
    .footer-link {
        font-size: 1.6rem; /* Ukuran font link */
        display: block; /* Membuat setiap link berada di baris baru */
        margin-bottom: 1.2rem; /* Jarak antar link */
        opacity: 0.8;
        transition: opacity 0.3s;
        text-decoration: none;
        color: inherit;
    }
    .footer-link:hover {
        opacity: 1;
    }

    /*
     * KELAS .footer-copyright
     * Ini adalah style untuk bagian paling bawah footer, kita jadikan sebagai container
     * untuk menengahkan kotak kuning.
    */
    .footer-copyright {
        /* PENJELASAN PERUBAHAN: Jarak atas dikurangi dari 4.8rem menjadi 3.2rem */
        margin-top: 3.2rem; /* Jarak dari konten di atasnya */
        text-align: center; /* Membuat konten di dalamnya (kotak kuning) menjadi di tengah */
        font-size: 1.4rem; /* 14px */
    }

    /* --- PENJELASAN: KELAS BARU UNTUK KOTAK KUNING DI COPYRIGHT --- */
    .copyright-box {
        background-color: #F5D364; /* Warna kuning, sama seperti tombol Hubungi di header */
        color: #114661; /* Warna teks gelap agar kontras dengan latar kuning */
        padding: 1rem 2rem; /* Jarak dalam (10px atas/bawah, 20px kiri/kanan) */
        border-radius: 0.8rem; /* Membuat sudut kotak melingkar (8px) */
        display: inline-block; /* Membuat elemen ini hanya selebar kontennya + padding */
        font-weight: 500; /* Sedikit lebih tebal agar mudah dibaca */
    }
</style>


{{-- STRUKTUR HTML FOOTER YANG BARU --}}
<footer class="footer-container">
    <div class="footer-content">
        
        <!-- Bagian Atas: Branding -->
        <div class="footer-top">
            <h3 class="footer-judul-utama">Dusun Jlegongan</h3>
            <p class="footer-alamat">Jlegongan, Margodadi, Seyegan, Sleman, Daerah Istimewa Yogyakarta</p>
        </div>
        
        <!-- Garis Pemisah -->
        <hr class="footer-divider">

        <!-- Bagian Bawah: Kontak dan Navigasi -->
        <div class="footer-bottom">
            
            <!-- Kolom Kiri: Kontak -->
            <div class="footer-kontak">
                <a href="mailto:jlegongan88@gmail.com" class="footer-link">jlegongan88@gmail.com</a>
            </div>

            <!-- Kolom Kanan: Grup Link -->
            <div class="footer-nav-group">
                <div class="footer-nav-kolom">
                    <h4>Potensi</h4>
                    <a href="#" class="footer-link">Pertanian</a>
                    <a href="#" class="footer-link">Peternakan</a>
                    <a href="#" class="footer-link">UMKM</a>
                </div>
                <div class="footer-nav-kolom">
                    <h4>Program</h4>
                    <a href="#" class="footer-link">Pelatihan</a>
                    <a href="#" class="footer-link">STOK</a>
                    <a href="#" class="footer-link">Lainnya</a>
                </div>
                <div class="footer-nav-kolom">
                    <h4>Profil</h4>
                    <a href="#" class="footer-link">Sejarah</a>
                    <a href="#" class="footer-link">Batas Wilayah</a>
                    <a href="#" class="footer-link">Peta Wilayah</a>
                </div>
            </div>

        </div>

        {{-- PENJELASAN: Perubahan pada bagian Copyright --}}
        {{-- Teks copyright sekarang dibungkus dengan div yang memiliki class 'copyright-box' --}}
        <div class="footer-copyright">
            <div class="copyright-box">
                &copy; {{ date('Y') }} Dusun Jlegongan. All Rights Reserved.
            </div>
        </div>

    </div>
</footer>
