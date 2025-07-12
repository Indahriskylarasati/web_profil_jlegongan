@extends('layouts.app')
@section('title', 'Demografi Dusun - Jlegongan')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/demografi.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush

@section('content')
    {{-- Hero Section --}}
    <div class="container mx-auto px-4 mt-8 mb-12">
        <section class="hero-section">
            <div class="swiper hero-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{ asset('images/hero/penduduk1 (1).jpg') }}" alt="Pemandangan Dusun 1" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/2E3A87/FFFFFF?text=Gambar+1+Tidak+Ditemukan';"></div>
                    <div class="swiper-slide"><img src="{{ asset('images/hero/penduduk1 (2).JPG') }}" alt="Aktivitas Warga Dusun" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/4A55A2/FFFFFF?text=Gambar+2+Tidak+Ditemukan';"></div>
                    <div class="swiper-slide"><img src="{{ asset('images/hero/WhatsApp Image 2025-06-26 at 16.39.14_0b450e07.jpg') }}" alt="Potensi Alam Dusun" onerror="this.onerror=null;this.src='https://placehold.co/1920x1080/7895CB/FFFFFF?text=Gambar+3+Tidak+Ditemukan';"></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="hero-content">
                <h1>Informasi</h1>
                <h2>Demografi Dusun Jlegongan</h2>
                <p> kondisi kependudukan dusun Jlegongan meliputi jumlah penduduk, distribusi usia, jenis kelamin, pendidikan, pekerjaan, dan struktur keluarga. Informasi ini penting sebagai dasar perencanaan pembangunan, pelayanan masyarakat, dan pengambilan kebijakan di tingkat lokal.</p>
            </div>
        </section>
    </div>

    <main class="container mx-auto px-4">
        <section class="demografi-section">
            <div class="section-heading">
                <h2 class="section-heading-title">Data Keluarga dan Penduduk</h2>
                <p class="section-heading-description">Ringkasan data populasi dan keluarga di Dusun Jlegongan.</p>
            </div>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-card-icon"><i class="fa-solid fa-users"></i></div>
                    <div class="stat-card-info">
                        <div class="stat-card-value">{{ $data->penduduk_total ?? 0 }}</div>
                        <div class="stat-card-label">Total Penduduk</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-card-icon"><i class="fa-solid fa-house-user"></i></div>
                    <div class="stat-card-info">
                        <div class="stat-card-value">{{ $data->kk_total ?? 0 }}</div>
                        <div class="stat-card-label">Kepala Keluarga</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-card-icon"><i class="fa-solid fa-person"></i></div>
                    <div class="stat-card-info">
                        <div class="stat-card-value">{{ $data->laki_laki ?? 0 }}</div>
                        <div class="stat-card-label">Laki-laki</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-card-icon"><i class="fa-solid fa-person-dress"></i></div>
                    <div class="stat-card-info">
                        <div class="stat-card-value">{{ $data->perempuan ?? 0 }}</div>
                        <div class="stat-card-label">Perempuan</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="demografi-section">
            <div class="section-heading">
                <h2 class="section-heading-title">Demografi Rentang Usia dan Jenis Kelamin</h2>
                <p class="section-heading-description">Persebaran penduduk berdasarkan usia dan jenis kelamin.</p>
            </div>
            <div class="chart-wrapper">
                <canvas id="grafikJenisKelaminUsia"></canvas>
            </div>
            <div class="chart-summary">
                <strong>Analisis:</strong> Untuk jenis kelamin <strong>laki-laki</strong>, kelompok umur <strong>Dewasa (19-55)</strong> adalah yang tertinggi dengan jumlah <strong>{{ $data->lk_dewasa ?? 0 }} jiwa</strong>. Sedangkan, untuk <strong>perempuan</strong>, kelompok umur <strong>Lansia (>55)</strong> adalah yang tertinggi dengan jumlah <strong>{{ $data->pr_lansia ?? 0 }} jiwa</strong>.
            </div>
        </section>
        
        <section class="demografi-section">
            <div class="section-heading">
                <h2 class="section-heading-title">Demografi Persebaran Wilayah</h2>
                <p class="section-heading-description">Jumlah penduduk di setiap Rukun Tetangga (RT).</p>
            </div>
            <div class="chart-wrapper">
                 <canvas id="grafikWilayah"></canvas>
            </div>
        </section>

        <section class="demografi-section">
             <div class="section-heading">
                <h2 class="section-heading-title">Tingkat Pendidikan</h2>
                <p class="section-heading-description">Distribusi tingkat pendidikan terakhir yang ditamatkan oleh warga.</p>
            </div>
            <div class="chart-wrapper">
                <canvas id="grafikPendidikan"></canvas>
             </div>
        </section>

        <section class="demografi-section">
            <div class="section-heading">
                <h2 class="section-heading-title">Persebaran Agama</h2>
                <p class="section-heading-description">Komposisi kepercayaan yang dianut oleh warga dusun.</p>
            </div>
            <div class="stats-grid grid-cols-1 md:grid-cols-3">
                <div class="agama-card">
                    <div class="agama-card-icon">🕌</div>
                    <div class="stat-card-info">
                        <div class="stat-card-value">{{ $data->agama_islam ?? 0 }}</div>
                        <div class="stat-card-label">Islam</div>
                    </div>
                </div>
                <div class="agama-card">
                    <div class="agama-card-icon">✝️</div>
                    <div class="stat-card-info">
                        <div class="stat-card-value">{{ $data->agama_katholik ?? 0 }}</div>
                        <div class="stat-card-label">Katholik</div>
                    </div>
                </div>
                <div class="agama-card">
                    <div class="agama-card-icon">⛪</div>
                    <div class="stat-card-info">
                        <div class="stat-card-value">{{ $data->agama_kristen ?? 0 }}</div>
                        <div class="stat-card-label">Kristen</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="demografi-section">
            <div class="section-heading">
                <h2 class="section-heading-title">Mata Pencaharian</h2>
                <p class="section-heading-description">Beragam profesi yang menjadi sumber penghidupan warga Jlegongan.</p>
            </div>
            <div class="chart-wrapper">
                <canvas id="grafikPekerjaan"></canvas>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
    {{-- Memuat library Chart.js dan Swiper.js dari CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
        
            // Mengaktifkan Hero Section Slider
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

            // MENGAMBIL DATA DARI CONTROLLER UNTUK GRAFIK
            const dataPendidikan = [ {{ $data->pendidikan_tidak_sekolah ?? 0 }}, {{ $data->pendidikan_belum_tamat_sd ?? 0 }}, {{ $data->pendidikan_tamat_sd ?? 0 }}, {{ $data->pendidikan_sltp ?? 0 }}, {{ $data->pendidikan_slta ?? 0 }}, {{ $data->pendidikan_akademi_d3 ?? 0 }}, {{ $data->pendidikan_s1 ?? 0 }}, {{ $data->pendidikan_s2 ?? 0 }} ];
            const dataPekerjaan = [ {{ $data->pekerjaan_belum_tidak_bekerja ?? 0 }}, {{ $data->pekerjaan_mengurus_rumah_tangga ?? 0 }}, {{ $data->pekerjaan_pelajar_mahasiswa ?? 0 }}, {{ $data->pekerjaan_pensiunan ?? 0 }}, {{ $data->pekerjaan_pns ?? 0 }}, {{ $data->pekerjaan_tni ?? 0 }}, {{ $data->pekerjaan_polri ?? 0 }}, {{ $data->pekerjaan_perangkat_desa ?? 0 }}, {{ $data->pekerjaan_wiraswasta ?? 0 }}, {{ $data->pekerjaan_petani ?? 0 }}, {{ $data->pekerjaan_buruh_tani ?? 0 }}, {{ $data->pekerjaan_buruh_harian_lepas ?? 0 }}, {{ $data->pekerjaan_karyawan_bumn ?? 0 }}, {{ $data->pekerjaan_pedagang ?? 0 }}, {{ $data->pekerjaan_dosen ?? 0 }}, {{ $data->pekerjaan_guru ?? 0 }}, {{ $data->pekerjaan_karyawan_honorer ?? 0 }} ];
            const dataWilayah = [ {{ $data->wilayah_rt_1 ?? 0 }}, {{ $data->wilayah_rt_2 ?? 0 }}, {{ $data->wilayah_rt_3 ?? 0 }}, {{ $data->wilayah_rt_4 ?? 0 }} ];
            const dataLkUsia = [ {{ $data->lk_dewasa ?? 0 }}, {{ $data->lk_lansia ?? 0 }}, {{ $data->lk_remaja ?? 0 }}, {{ $data->lk_anak ?? 0 }}, {{ $data->lk_balita ?? 0 }}, {{ $data->lk_tidak_diketahui ?? 0 }} ];
            const dataPrUsia = [ {{ $data->pr_dewasa ?? 0 }}, {{ $data->pr_lansia ?? 0 }}, {{ $data->pr_remaja ?? 0 }}, {{ $data->pr_anak ?? 0 }}, {{ $data->pr_balita ?? 0 }}, {{ $data->pr_tidak_diketahui ?? 0 }} ];

            // INISIALISASI SEMUA GRAFIK
            new Chart(document.getElementById('grafikJenisKelaminUsia'), { type: 'bar', data: { labels: ['Dewasa', 'Lansia', 'Remaja', 'Anak-anak', 'Balita', 'Tdk Diketahui'], datasets: [{ label: 'Laki-laki', data: dataLkUsia.map(v => -v), backgroundColor: '#114661' },{ label: 'Perempuan', data: dataPrUsia, backgroundColor: '#F5D364' }] }, options: { indexAxis: 'y', responsive: true, scales: { x: { ticks: { callback: v => Math.abs(v) }}, y: { stacked: true }}, plugins: { tooltip: { callbacks: { label: c => `${c.dataset.label}: ${Math.abs(c.raw)}` }}} } });
            new Chart(document.getElementById('grafikWilayah'), { type: 'bar', data: { labels: ['RT 1', 'RT 2', 'RT 3', 'RT 4'], datasets: [{ data: dataWilayah, backgroundColor: ['#114661', '#F5D364', '#7895CB', '#2E8B57'] }] }, options: { plugins: { legend: { display: false } } } });
            new Chart(document.getElementById('grafikPendidikan'), { type: 'bar', data: { labels: ['Tidak Sekolah', 'Belum Tamat SD', 'Tamat SD', 'SLTP', 'SLTA', 'D3', 'S1', 'S2'], datasets: [{ label: 'Jumlah Jiwa', data: dataPendidikan, backgroundColor: '#114661' }] }, options: { indexAxis: 'y', responsive: true, plugins: { legend: { display: false } } } });
            new Chart(document.getElementById('grafikPekerjaan'), { type: 'bar', data: { labels: [ 'Tdk Bekerja', 'Ibu RT', 'Pelajar', 'Pensiunan', 'PNS', 'TNI', 'POLRI', 'Perangkat Desa', 'Wiraswasta', 'Petani', 'Buruh Tani', 'Buruh Harian', 'BUMN', 'Pedagang', 'Dosen', 'Guru', 'Honorer' ], datasets: [{ label: 'Jumlah Jiwa', data: dataPekerjaan, backgroundColor: '#F5D364' }] }, options: { indexAxis: 'y', responsive: true, plugins: { legend: { display: false } } } });
        });
    </script>
@endpush
