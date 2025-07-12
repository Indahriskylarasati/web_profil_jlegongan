{{-- 
    PENJELASAN FILE: partials/footer.blade.php
    File ini hanya berisi kode untuk bagian footer (kaki halaman) website.
--}}

{{-- CSS KHUSUS UNTUK FOOTER --}}
<style>
    /*
     * KELAS .footer-container
     */
    .footer-container {
        background-color: #114661; 
        color: #FFFFFF;
        /* PERUBAHAN: Padding atas diperkecil agar lebih pendek */
        padding-top: 2.5rem;
        margin-top: 2.8rem;
    }

    /*
     * KELAS .footer-content
     */
    .footer-content {
        max-width: 1152px;
        margin: auto;
        /* PERUBAHAN: Padding bawah diperkecil */
        padding: 0 3rem 1.5rem 3rem;
    }

    /*
     * KELAS .footer-top
     */
    .footer-top {
        padding-bottom: 1.5rem; /* Jarak ke garis pemisah diperkecil */
    }
    .footer-judul-utama {
        font-size: 1.5rem;
        font-weight: 700;
        margin: 0 0 0.5rem 0; /* Jarak bawah judul diperkecil */
    }
    .footer-alamat {
        font-size: 1rem;
        font-weight: 400;
        margin: 0;
        opacity: 0.8;
    }

    /*
     * KELAS .footer-divider
     */
    .footer-divider {
        border: none;
        height: 1px;
        background-color: rgba(255, 255, 255, 0.2);
        margin: 0;
    }

    /*
     * KELAS .footer-bottom
     */
    .footer-bottom {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: flex-start;
        /* PERUBAHAN: Padding atas dan gap diperkecil */
        padding-top: 1.5rem;
        gap: 2rem; 
    }

    /*
     * KELAS .footer-kontak & .footer-link
     */
    .footer-kontak .footer-link {
        font-weight: 500;
    }
    .footer-link {
        font-size: 0.9rem;
        display: block;
        margin-bottom: 0.8rem;
        opacity: 0.8;
        transition: opacity 0.3s;
        text-decoration: none;
        color: inherit;
    }
    .footer-link:hover {
        opacity: 1;
    }

    /*
     * KELAS .footer-nav-group
     */
    .footer-nav-group {
        display: flex;
        flex-wrap: wrap;
        gap: 3rem; /* Jarak antar kolom navigasi disesuaikan */
    }
    .footer-nav-kolom h4 {
        font-size: 1rem;
        font-weight: 700;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        margin: 0 0 1rem 0; /* Jarak ke link di bawahnya diperkecil */
    }
    
    /*
     * KELAS .footer-copyright-bar
     */
    .footer-copyright-bar {
        background-color: #F5D364;
        color: #114661;
        text-align: center;
        padding: 0.8rem; /* Padding diperkecil */
        font-size: 0.875rem;
        font-weight: 600;
    }
</style>


{{-- STRUKTUR HTML FOOTER YANG BARU --}}
<footer class="footer-container">
    <div class="footer-content">
        
        <div class="footer-top">
            <h3 class="footer-judul-utama">Dusun Jlegongan</h3>
            <p class="footer-alamat">Jlegongan, Margodadi, Seyegan, Sleman, Daerah Istimewa Yogyakarta</p>
        </div>
        
        <hr class="footer-divider">

        <div class="footer-bottom">
            
            <div class="footer-kontak">
                <a href="mailto:jlegongan88@gmail.com" class="footer-link">jlegongan089@gmail.com</a>
            </div>

            <div class="footer-nav-group">
                <div class="footer-nav-kolom">
                    <h4>Potensi</h4>
                    <a href="#" class="footer-link">Pertanian</a>
                    <a href="#" class="footer-link">UMKM</a>
                    <a href="#" class="footer-link">Masyarakat</a>
                </div>
                <div class="footer-nav-kolom">
                    <h4>Agenda</h4>
                    <a href="#" class="footer-link">Pemuda</a>
                    <a href="#" class="footer-link">PKK</a>
                    <a href="#" class="footer-link">KWT</a>
                    <a href="#" class="footer-link">Agama</a>
                </div>
                <div class="footer-nav-kolom">
                    <h4>Profil</h4>
                    <a href="#" class="footer-link">Deskripsi</a>
                    <a href="#" class="footer-link">Peta Wilayah</a>
                    <a href="#" class="footer-link">STOK</a>
                </div>
            </div>

        </div>

    </div>

    {{-- Teks copyright sekarang berada di dalam barisnya sendiri di luar .footer-content --}}
    <div class="footer-copyright-bar">
        &copy; {{ date('Y') }} Dusun Jlegongan. All Rights Reserved.
    </div>
</footer>
