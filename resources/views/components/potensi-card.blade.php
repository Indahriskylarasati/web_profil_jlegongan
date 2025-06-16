{{-- 
    File Komponen: resources/views/components/potensi-card.blade.php
    Ini adalah template untuk satu kartu potensi.
    Komponen ini menerima variabel: $icon, $title, dan $description.
--}}

@props(['icon', 'title', 'description'])

<div class="potensi-card">
    {{-- Memanggil ikon dari folder /public/images/icons/ --}}
    {{-- Helper asset() akan membuat URL yang benar. Nama file ikon diambil dari variabel $icon. --}}
    <img src="{{ asset('/images/icons/' . $icon) }}" alt="Ikon {{ $title }}" class="potensi-icon" onerror="this.onerror=null;this.src='https://placehold.co/64x64/F5D364/114661?text=Icon';">
    
    <h3>{{ $title }}</h3>
    <p>{{ $description }}</p>
</div>
