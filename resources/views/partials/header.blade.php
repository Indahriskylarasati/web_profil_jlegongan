{{-- /resources/views/partials/header.blade.php --}}

@push('styles')
<style>
    /* === BAGIAN HEADER UTAMA === */
    .header-container {
        background-color: #114661;
        padding: 1rem 1.5rem; /* 16px 24px */
        position: sticky;
        top: 0;
        z-index: 50;
        transition: box-shadow 0.3s ease, padding 0.3s ease;
    }

    /* Efek shadow saat halaman di-scroll */
    .header-container.scrolled {
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        padding: 0.75rem 1.5rem; /* Membuat header sedikit lebih tipis saat scroll */
    }

    /* Konten di dalam header */
    .header-content {
        max-width: 72rem; /* 1152px */
        margin: auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Logo Website */
    .header-logo {
        color: #F0F0F0;
        font-size: 1.8rem; /* 24px */
        font-weight:900;
        text-decoration: none;
    }

    /* === BAGIAN NAVIGASI DESKTOP === */

    /* Wadah utama navigasi desktop */
    .header-nav-container {
        background-color: white;
        padding: 0.5rem; /* 8px */
        border-radius: 9999px;
        box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        display: none; /* Disembunyikan di mobile, ditampilkan di desktop via @media */
        gap: 0.5rem; /* 8px */
        align-items: center;
    }

    /* Setiap item di navigasi (termasuk yang punya dropdown) */
    .nav-item {
        position: relative;
    }

    /* Tombol/link utama di navigasi */
    .header-nav-link {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
        font-weight: 600;
        color: #181823;
        border-radius: 9999px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
        /* PERBAIKAN: Menambahkan jarak antara tulisan dan ikon panah */
        gap: 0.4rem;
    }

    /* State aktif/hover untuk tombol navigasi */
    .header-nav-link.active,
    .header-nav-link:hover {
        background-color: #F5D364;
    }

    /* Dropdown menu untuk desktop */
    .dropdown-menu {
        position: absolute;
        top: calc(100% + 0.75rem);
        left: 50%;
        transform: translateX(-50%);
        background-color: white;
        border-radius: 0.75rem;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        padding: 0.5rem;
        width: 200px;
        z-index: 100;
        opacity: 0;
        visibility: hidden;
        transform-origin: top center;
        transition: opacity 0.3s ease, transform 0.3s ease, visibility 0.3s;
        transform: translateX(-50%) translateY(-10px);
    }
    
    /* Menampilkan dropdown saat item navigasi di-hover */
    .nav-item:hover .dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(0);
    }

    /* Link di dalam dropdown */
    .dropdown-link {
        display: block;
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
        color: #374151;
        text-decoration: none;
        border-radius: 0.5rem;
        transition: background-color 0.2s, color 0.2s;
    }
    .dropdown-link:hover {
        background-color: #F5D364;
        color: #114661;
    }

    /* Tombol Hubungi */
    .header-btn-hubungi {
        background-color: #F5D364;
        color: #181823;
        padding: 0.75rem 1.5rem; /* 12px 24px */
        border-radius: 9999px;
        font-weight: 800;
        text-decoration: none;
        transition: background-color 0.3s ease;
        display: none;
        font-size: 1rem;
    }
    .header-btn-hubungi:hover {
        background-color: #e5e7eb;
    }

    /* === BAGIAN NAVIGASI MOBILE === */
    
    /* Tombol Hamburger */
    .hamburger-btn {
        background: none;
        border: none;
        cursor: pointer;
        padding: 0;
        z-index: 101; /* Z-index tertinggi agar selalu bisa diklik */
    }
    .hamburger-btn svg {
        width: 2.25rem;
        height: 2.25rem;
        stroke: white;
    }

    /* Menu overlay untuk mobile */
    .mobile-menu {
        position: fixed;
        top: 0;
        left: -100%;
        width: 80%;
        max-width: 320px;
        height: 100%;
        background-color: #114661;
        z-index: 100;
        transition: left 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        display: flex;
        flex-direction: column;
        padding: 6rem 1.5rem 2rem;
        gap: 0.5rem;
    }
    .mobile-menu.is-open {
        left: 0;
        box-shadow: 5px 0px 25px rgba(0,0,0,0.2);
    }

    /* Tombol tutup menu mobile */
    .mobile-menu-close-btn {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        background: none;
        border: none;
        padding: 0.5rem;
    }
    .mobile-menu-close-btn svg {
        width: 2rem;
        height: 2rem;
        stroke: white;
    }

    /* Item link di menu mobile */
    .mobile-menu-link {
        color: white;
        text-decoration: none;
        font-size: 1.1rem;
        padding: 0.6rem 1rem;
        border-radius: 0.5rem;
        transition: background-color 0.2s;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 0.5rem;
    }
    .mobile-menu-link:hover, .mobile-menu-link.active {
        background-color: rgba(255, 255, 255, 0.1);
    }

    /* Sub-menu di mobile (accordion) */
    .mobile-submenu {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease-in-out;
        padding-left: 1rem;
        margin-top: 0.25rem;
    }
    .mobile-submenu-link {
        display: block;
        color:rgb(174, 180, 192);
        text-decoration: none;
        font-size: 1rem;
        padding: 0.6rem 1rem;
        border-radius: 0.5rem;
        margin-bottom: 0.25rem;
    }
    .mobile-submenu-link:hover {
        background-color: rgba(255, 255, 255, 0.05);
        color: white;
    }

    /* Panah dropdown di mobile */
    .submenu-arrow {
        transition: transform 0.3s;
        font-size: 0.8rem;
    }
    .has-submenu.is-active .submenu-arrow {
        transform: rotate(180deg);
    }
    
    /* Aturan @media untuk menampilkan/menyembunyikan elemen */
    @media (min-width: 1024px) {
        .header-nav-container,
        .header-btn-hubungi {
            display: flex;
        }
        .hamburger-btn {
            display: none;
        }
    }
</style>

<header class="header-container" id="main-header">
    <div class="header-content">
        <a href="{{ route('profil.dusun') }}" class="header-logo">JLEGONGAN</a>

        <nav class="header-nav-container">
            <div class="nav-item">
                <a href="{{ route('profil.dusun') }}" class="header-nav-link {{ request()->routeIs('profil.dusun') || request()->routeIs('pengurus.index') ? 'active' : '' }}">
                    <span>Profil Dusun</span>
                    
                </a>
                <div class="dropdown-menu">
                    <a href="{{ route('pengurus.index') }}" class="dropdown-link">Struktur Pengurus</a>
                </div>
            </div>
            
            <div class="nav-item">
                <a href="{{ route('potensi.pertanian') }}" class="header-nav-link {{ request()->routeIs('potensi.pertanian') ? 'active' : '' }}">
                    <span>Potensi</span>
                
                </a>
                <div class="dropdown-menu">
                    <a href="{{ route('potensi.pertanian') }}" class="dropdown-link">Pertanian</a>
                    <a href="{{ route('potensi.umkm') }}" class="dropdown-link">UMKM</a>
                    <a href="{{ route('potensi.masyarakat') }}" class="dropdown-link">Masyarakat</a>
                </div>
            </div>
            <a href="{{ route('demografi.index') }}" class="header-nav-link {{ request()->routeIs('demografi.index') ? 'active' : '' }}">Demografi</a>
            <a href="{{ route('agenda.index') }}" class="header-nav-link {{ request()->routeIs('agenda.index') ? 'active' : '' }}">Agenda</a>
            <a href="{{ route('produk.index') }}" class="header-nav-link {{ request()->routeIs('produk.index') ? 'active' : '' }}">Produk</a>
            <a href="{{ route('berita.index') }}" class="header-nav-link {{ request()->routeIs('berita.index') ? 'active' : '' }}">Berita</a>
        </nav>

        <div class="flex items-center gap-4">
             <a href="https://wa.me/6282333224727" target="_blank" rel="noopener noreferrer" class="header-btn-hubungi">Hubungi</a>
             <button class="hamburger-btn" id="hamburger-btn" aria-label="Buka menu">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
    </div>
</header>

<div class="mobile-menu" id="mobile-menu">
    <button class="mobile-menu-close-btn" id="close-menu-btn" aria-label="Tutup menu">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
    
    <div class="mobile-nav-item">
        <button type="button" class="mobile-menu-link has-submenu">
            <span>Profil Dusun</span>
            <i class="fa-solid fa-chevron-down submenu-arrow"></i>
        </button>
        <div class="mobile-submenu">
            <a href="{{ route('pengurus.index') }}" class="mobile-submenu-link">Struktur Pengurus</a>
        </div>
    </div>

    <div class="mobile-nav-item">
        <button type="button" class="mobile-menu-link has-submenu">
            <span>Potensi</span>
            <i class="fa-solid fa-chevron-down submenu-arrow"></i>
        </button>
        <div class="mobile-submenu">
            <a href="{{ route('potensi.pertanian') }}" class="mobile-submenu-link">Pertanian</a>
            <a href="{{ route('potensi.umkm') }}" class="mobile-submenu-link">UMKM</a>
            <a href="{{ route('potensi.masyarakat') }}" class="mobile-submenu-link">Masyarakat</a>
        </div>
    </div>
    
     <a href="{{ route('demografi.index') }}" class="mobile-menu-link {{ request()->routeIs('demografi.index') ? 'active' : '' }}">Demografi</a>
            <a href="{{ route('agenda.index') }}" class="mobile-menu-link {{ request()->routeIs('agenda.index') ? 'active' : '' }}">Agenda</a>
            <a href="{{ route('produk.index') }}" class="mobile-menu-link {{ request()->routeIs('produk.index') ? 'active' : '' }}">Produk</a>
            <a href="{{ route('berita.index') }}" class="mobile-menu-link {{ request()->routeIs('berita.index') ? 'active' : '' }}">Berita</a>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const header = document.getElementById('main-header');
        const hamburgerBtn = document.getElementById('hamburger-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const closeMenuBtn = document.getElementById('close-menu-btn');
        const submenuToggles = document.querySelectorAll('.has-submenu');

        // Efek shadow saat scroll
        window.addEventListener('scroll', function() {
            if (window.scrollY > 10) { 
                header.classList.add('scrolled');
            } else { 
                header.classList.remove('scrolled');
            }
        });

        // Logika buka-tutup menu mobile utama
        if (hamburgerBtn && mobileMenu && closeMenuBtn) {
            hamburgerBtn.addEventListener('click', () => mobileMenu.classList.add('is-open'));
            closeMenuBtn.addEventListener('click', () => mobileMenu.classList.remove('is-open'));
        }

        // Logika buka-tutup sub-menu (accordion) di mobile
        submenuToggles.forEach(button => {
            button.addEventListener('click', () => {
                const submenu = button.nextElementSibling;
                // Tutup semua sub-menu lain kecuali yang ini
                submenuToggles.forEach(otherButton => {
                    if (otherButton !== button) {
                        otherButton.classList.remove('is-active');
                        otherButton.nextElementSibling.style.maxHeight = null;
                    }
                });

                // Buka atau tutup sub-menu yang diklik
                button.classList.toggle('is-active');
                if (submenu.style.maxHeight) {
                    submenu.style.maxHeight = null;
                } else {
                    submenu.style.maxHeight = submenu.scrollHeight + "px";
                }
            });
        });
    });
</script>