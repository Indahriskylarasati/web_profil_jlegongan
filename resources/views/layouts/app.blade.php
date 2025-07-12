<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Website Profil Dusun Jlegongan')</title>

   
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('css/potensi-umkm.css') }}">
    
    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex flex-col">
        
        {{-- Header akan selalu muncul di setiap halaman --}}
        @include('partials.header')

        {{-- Konten utama yang akan diisi oleh halaman anak --}}
        <main class="flex-grow">
            @yield('content')
        </main>

        {{-- Footer akan selalu muncul di setiap halaman --}}
        @include('partials.footer')

    </div>

    {{-- Stack untuk script per halaman (jika butuh) --}}
    @stack('scripts')
</body>
</html>