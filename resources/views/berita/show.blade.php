@extends('layouts.app')

@section('title', $berita->title)

@push('styles')
<link rel="stylesheet" href="{{ asset('css/detail-berita.css') }}">
@endpush

@section('content')
    <div class="container mx-auto py-12 px-4">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 lg:gap-12">

            {{-- === KONTEN BERITA ===== --}}
            <div class="lg:col-span-3">
                <article>
                    <header class="article-header">
                        <h1 class="article-title">{{ $berita->title }}</h1>
                        <p class="article-meta">
                            Ditulis oleh <strong>{{ $berita->penulis }}</strong> pada {{ $berita->published_at->format('d F Y') }}
                        </p>
                    </header>
                    
                    @if ($berita->image)
                        <figure>
                            <img src="{{ asset('storage/' . $berita->image) }}" alt="{{ $berita->title }}" class="article-image">
                        </figure>
                    @endif

                    <div class="article-content">
                        {!! $berita->content !!}
                    </div>
                </article>
            </div>

            {{-- === KONTEN LAINNYA ===== --}}
            <div class="lg:col-span-1">
                <aside class="sidebar">
                    <h3 class="sidebar-title">Berita Lainnya</h3>
                    
                    @forelse($beritaLainnya as $itemLain)
                        <a href="{{ route('berita.show', $itemLain->slug) }}" class="sidebar-item group">
                            <img src="{{ $itemLain->image ? asset('storage/' . $itemLain->image) : 'https://placehold.co/100x75/e2e8f0/adb5bd?text=...' }}" alt="{{ $itemLain->title }}">
                            <div>
                                <h5 class="group-hover:text-[#114661]">{{ $itemLain->title }}</h5>
                            </div>
                        </a>
                    @empty
                        <p>Tidak ada berita lainnya untuk ditampilkan.</p>
                    @endforelse
                </aside>
            </div>

        </div>
    </div>
@endsection
