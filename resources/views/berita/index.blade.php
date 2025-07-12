@extends('layouts.app')
@section('title', 'Berita Dusun Jlegongan')
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('css/berita.css') }}">
@endpush

@section('content')
    <div class="container mx-auto px-4 mt-8 mb-12">
        <section class="hero-section">
            <div class="swiper hero-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{ asset('images/hero/WhatsApp Image 2025-06-26 at 16.39.14_1efb7d79.jpg') }}" alt="Pemandangan Dusun 1" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/2E3A87/FFFFFF?text=Gambar+1';"></div>
                    <div class="swiper-slide"><img src="{{ asset('images/agenda/DSC00178.JPG') }}" alt="Aktivitas Warga Dusun" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/4A55A2/FFFFFF?text=Gambar+2';"></div>
                    <div class="swiper-slide"><img src="{{ asset('images/hero/WhatsApp Image 2025-06-26 at 16.39.14_88b25364.jpg') }}" alt="Potensi Alam Dusun" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/7895CB/FFFFFF?text=Gambar+3';"></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="hero-content">
                <h1>Selamat Datang</h1>
                <h2>Halaman Berita Dusun Jlegongan</h2>
                <p>Kumpulan informasi, kegiatan, dan kabar terbaru dari lingkungan kami.</p>
            </div>
        </section>
    </div>

    <div class="container mx-auto px-4">
        {{-- Form Pencarian --}}
        <div class="mb-10 max-w-2xl mx-auto">
            <form action="{{ route('berita.index') }}" method="GET">
                <div class="relative">
                    <input type="search" name="search" placeholder="Ketik judul berita yang ingin Anda cari..." class="w-full pl-5 pr-4 py-3 border-2 border-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-[#114661]" value="{{ request('search') }}">
                    <button type="submit" class="absolute top-0 right-0 h-full px-6 text-white bg-[#114661] rounded-full flex items-center">
                        Cari
                    </button>
                </div>
            </form>
        </div>

        {{-- Grid Berita --}}
        <div class="berita-grid">
            @forelse($beritas as $berita)
                <a href="{{ route('berita.show', $berita->slug) }}" class="berita-card transition duration-300 hover:shadow-xl hover:-translate-y-1 block no-underline">
                    @if ($berita->image)
                        <img src="{{ asset('storage/' . $berita->image) }}" alt="{{ $berita->title }}">
                    @else
                        <img src="https://placehold.co/400x225/e2e8f0/adb5bd?text=Gambar" alt="Gambar tidak tersedia">
                    @endif
                    <div class="berita-card-content">
                        <h3 class="berita-card-title">{{ $berita->title }}</h3>
                        <p class="berita-card-meta">Oleh {{ $berita->penulis }} &bull; {{ $berita->published_at->format('d M Y') }}</p>
                        <p class="berita-card-excerpt">{{ Str::limit(strip_tags($berita->content), 80) }}</p>
                    </div>
                </a>
            @empty
                <div class="col-span-full text-center text-gray-500 py-10">
                    <p class="font-semibold text-xl">Berita tidak ditemukan.</p>
                </div>
            @endforelse
        </div>

        {{-- Link Pagination --}}
        <div class="mt-12">
            {{ $beritas->links() }}
        </div>
    </div>
@endsection

@push('scripts')
    {{-- UNTUK MEMUAT FILE JAVASCRIPT DARI SWIPER.JS --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    {{-- MENGAKTIFKAN SLIDER--}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const heroSwiper = new Swiper('.hero-swiper', {
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                effect: 'fade', 
                fadeEffect: {
                    crossFade: true
                },
            });
        });
    </script>
@endpush
