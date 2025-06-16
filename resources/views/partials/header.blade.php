<style>
    /* Wadah utama header */
    .header-container {
        /* Ubah warna latar belakang header di sini */
        background-color: #114661;
        padding: 16px 24px;
    }

    /* Konten di dalam header (logo, nav, tombol) */
    .header-content {
        max-width: 1152px;
        margin: auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Pengaturan untuk Logo */
    .header-logo {
        /* Ubah warna & ukuran font logo di sini */
        color: #F0F0F0;
        font-size: 24px;
        font-weight: 700;
        text-decoration: none;
    }

    /* Pengaturan untuk wadah/pil navigasi utama */
    .header-nav-container {
        background-color: white;
        padding: 8px; /* Padding di dalam pil putih */
        border-radius: 9999px;
        box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        display: none; /* Disembunyikan di layar kecil (mobile) */
        gap: 8px; /* Jarak antar tombol di dalam pil */
    }

    /* Pengaturan untuk setiap tombol/link di dalam navigasi */
    .header-nav-link {
        padding: 10px 20px;
        /* Ubah ukuran & ketebalan font tombol navigasi di sini */
        font-size: 16px;
        font-weight: 700;
        /* Ubah warna teks tombol navigasi di sini */
        color: #181823;
        border-radius: 9999px;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    /* Pengaturan untuk tombol yang sedang aktif atau saat disentuh mouse */
    .header-nav-link.active,
    .header-nav-link:hover {
        /* Ubah warna latar tombol aktif/hover di sini */
        background-color: #F5D364;
        color: #181823;
    }
    
    /* Pengaturan untuk tombol "Hubungi" */
    .header-btn-hubungi {
        /* Ubah warna latar tombol "Hubungi" di sini */
        background-color: #F5D364;
        /* Ubah warna teks tombol "Hubungi" di sini */
        color: #181823;
        padding: 12px 24px;
        border-radius: 9999px;
        font-weight: 700;
        text-decoration: none;
        transition: background-color 0.3s ease;
        display: none; /* Disembunyikan di layar kecil (mobile) */
    }
    .header-btn-hubungi:hover {
        /* Warna saat tombol "Hubungi" disentuh mouse */
        background-color: #ECF3F6; /* Kuning lebih gelap */
    }

    /* Aturan untuk layar yang lebih lebar (desktop) */
    @media (min-width: 1024px) { /* lg breakpoint */
        .header-nav-container,
        .header-btn-hubungi {
            display: flex; /* Menampilkan navigasi & tombol hubungi di layar besar */
        }
    }

</style>

<header class="header-container">
    <div class="header-content">
        <!-- Logo -->
        <a href="/" class="header-logo">JLEGONGAN</a>

        <!-- Navigasi Utama (di dalam pil putih) -->
        <nav class="header-nav-container">
            <!-- 
              PENJELASAN:
              - `request()->is('profil-dusun')` adalah kode Laravel untuk mengecek apakah URL saat ini adalah '.../profil-dusun'.
              - Jika ya, maka kelas 'active' akan ditambahkan, yang membuatnya menjadi kuning.
              - Ganti tanda '#' dengan URL halaman Anda yang sebenarnya (contoh: href="/profil-dusun").
            -->
            <a href="/profil-dusun" class="header-nav-link {{ request()->is('profil-dusun') ? 'active' : '' }}">Profil Dusun</a>
            <a href="/potensi" class="header-nav-link {{ request()->is('potensi') ? 'active' : '' }}">Potensi</a>
            <a href="/demografi" class="header-nav-link {{ request()->is('demografi') ? 'active' : '' }}">Demografi</a>
            <a href="/produk" class="header-nav-link {{ request()->is('produk') ? 'active' : '' }}">Produk</a>
            <a href="/agenda" class="header-nav-link {{ request()->is('agenda') ? 'active' : '' }}">Agenda</a>
        </nav>

        <!-- Tombol Hubungi -->
        <a href="/hubungi" class="header-btn-hubungi">Hubungi</a>
    </div>
</header>
