@extends('layouts.main')

@section('content')
    <div class="container-fluid bg-light py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <article class="bg-white p-4 rounded-lg shadow-sm">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/berita">Berita</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $new_berita["judul"] }}</li>
                        </ol>
                    </nav>

                    <header class="mb-4">
                        <h1 class="display-4 text-primary mb-3">{{ $new_berita["judul"] }}</h1>
                        <div class="d-flex align-items-center text-muted">
                            <span class="me-3"><i class="fas fa-user me-1"></i> {{ $new_berita["penulis"] }}</span>
                            <span class="me-3"><i class="fas fa-calendar me-1"></i> {{ \Carbon\Carbon::parse($new_berita["tanggal"])->format('d M Y') }}</span>
                            <span><i class="fas fa-tag me-1"></i> {{ $new_berita["kategori"] }}</span>
                        </div>
                    </header>

                    <div class="content">
                        <p class="lead">{{ $new_berita["konten"] }}</p>
                    </div>

                    <footer class="mt-5 pt-4 border-top">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="/berita" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Kembali ke Berita
                            </a>
                            <div class="social-share">
                                <span class="text-muted me-2">Bagikan:</span>
                                <a href="#" class="text-primary me-2"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="text-info me-2"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="text-danger"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </footer>
                </article>
            </div>
        </div>
    </div>
@endsection
