@extends('layouts.app')
@section('title', 'Agenda Kegiatan - Dusun Jlegongan')
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="{{ asset('css/agenda.css') }}">
@endpush

@section('content')
<div class="page-wrapper py-12">
    <div class="container mx-auto px-4">
        
         <section class="hero-section mb-12">
            <div class="swiper hero-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{ asset('images/hero/alam2.jpg') }}" alt="Pemandangan Dusun 1" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/2E3A87/FFFFFF?text=Gambar+1+Tidak+Ditemukan';"></div>
                    <div class="swiper-slide"><img src="{{ asset('images/hero/pemuda1.jpg') }}" alt="Aktivitas Warga Dusun" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/4A55A2/FFFFFF?text=Gambar+2+Tidak+Ditemukan';"></div>
                    <div class="swiper-slide"><img src="{{ asset('images/agenda/pemuda.JPG') }}" alt="Potensi Alam Dusun" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/7895CB/FFFFFF?text=Gambar+3+Tidak+Ditemukan';"></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="hero-content">
                <h1>Agenda</h1>
                <h2>Masyarakat Dusun Jlegongan</h2>
                <p>Masyarakat Dusun Jlegongan memiliki beberapa agenda kegiatan yang dilaksanakan pada setiap bulan, baik kegiatan ruitinan atau agenda lainnya bagi pemuda, ibu PKK, KWT ataupun kegiatan kerohanian</p>
            </div>
            </div>
        </section>

        <div class="filter-buttons">
            <a href="{{ route('agenda.index') }}" 
               class="filter-btn {{ !$active_category ? 'active' : 'inactive' }}">
               Semua Agenda
            </a>
            @foreach ($categories as $category)
                <a href="{{ route('agenda.index', ['kategori' => $category]) }}"
                   class="filter-btn {{ $active_category == $category ? 'active' : 'inactive' }}">
                   {{ $category }}
                </a>
            @endforeach
        </div>

        @forelse($agendas as $agenda)
            <div class="agenda-card">
                <div class="agenda-image">
                    <img src="{{ $agenda->main_image ? asset('storage/' . $agenda->main_image) : 'https://placehold.co/600x400/e2e8f0/adb5bd?text=Gambar' }}" alt="{{ $agenda->title }}">
                </div>
                <div class="agenda-details">
                    <h3>{{ $agenda->title }}</h3>
                    <p class="schedule">{{ $agenda->schedule }}</p>
                    <div class="description">
                        {!! $agenda->description !!}
                    </div>
                    
                    @if(!empty($agenda->gallery) && count($agenda->gallery) > 0)
                        <p class="gallery-title">Dokumentasi Kegiatan:</p>
                        <div class="gallery-grid">
                            @foreach ($agenda->gallery as $photo)
                                <img src="{{ asset('storage/' . $photo) }}" alt="Dokumentasi {{ $agenda->title }}">
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="text-center py-16 bg-white rounded-lg">
                <p class="text-xl font-semibold text-gray-700">Belum ada agenda untuk kategori ini.</p>
                <p class="text-gray-500 mt-2">Silakan pilih kategori lain atau kembali ke Semua Agenda.</p>
            </div>
        @endforelse

    </div>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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