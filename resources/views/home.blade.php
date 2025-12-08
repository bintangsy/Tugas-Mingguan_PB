
@extends('layouts.main')

@section('content')
<section class="py-4">
    <style>
        .hero { background: linear-gradient(180deg,#f8fafc,#ffffff); padding:1rem; border-radius:.5rem; }
        .hero-title{ color:#0d6efd; font-weight:700; font-size:1.35rem; margin:0; }
        .hero-sub{ color:#6c757d; font-size:.95rem; margin-top:.25rem; }
        .card-compact{ border-radius:.5rem; transition:transform .15s; }
        .card-compact:hover{ transform:translateY(-6px); }
        .btn-sm-compact{ padding:.4rem .75rem; font-size:.9rem; }
        @media (min-width:768px){ .hero-title{ font-size:1.6rem; } }
    </style>

    <div class="hero d-flex flex-column flex-md-row align-items-center gap-3 mb-3">
        <div class="flex-grow-1">
            <h1 class="hero-title">Selamat Datang</h1>
            <p class="hero-sub">Situs contoh untuk tugas PBO. Navigasi cepat ke halaman Profile, Berita, dan Kontak tersedia di menu.</p>
            <div class="d-flex gap-2 mt-2">
                <a href="{{ url('/profile') }}" class="btn btn-sm btn-outline-primary btn-sm-compact">Profile</a>
                <a href="{{ url('/berita') }}" class="btn btn-sm btn-outline-secondary btn-sm-compact">Berita</a>
                <a href="{{ url('/contact') }}" class="btn btn-sm btn-outline-success btn-sm-compact">Contact</a>
            </div>
        </div>

        <div style="width:140px;min-width:110px;">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=400&q=60" alt="Welcome" class="img-fluid rounded">
        </div>
    </div>

    <div class="row g-3">
        <div class="col-12 col-md-4">
            <div class="card card-compact shadow-sm p-3 h-100">
                <h6 class="mb-2">Ringkas & Rapi</h6>
                <p class="small text-muted mb-0">Tata letak sederhana untuk memudahkan navigasi dan pembacaan konten.</p>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card card-compact shadow-sm p-3 h-100">
                <h6 class="mb-2">Responsif</h6>
                <p class="small text-muted mb-0">Desain bekerja baik di desktop maupun perangkat mobile.</p>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card card-compact shadow-sm p-3 h-100">
                <h6 class="mb-2">Mudah Dikembangkan</h6>
                <p class="small text-muted mb-0">Struktur Blade sederhana memudahkan penambahan fitur di kemudian hari.</p>
            </div>
        </div>
    </div>

    <div class="mt-3 text-center">
        <small class="text-muted">Teknologi Informasi • 2025</small>
    </div>
</section>
@endsection