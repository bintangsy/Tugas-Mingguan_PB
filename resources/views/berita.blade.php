@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-4">Berita Terbaru</h1>
        </div>
    </div>
    <div class="row">
        @foreach ( $beritas as $berita )
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="/berita/{{ $berita['slug'] }}" class="text-decoration-none text-dark">{{ $berita['judul'] }}</a>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted">Oleh: {{ $berita['penulis'] }}</h6>
                    <p class="card-text">{{ Str::limit($berita['konten'], 100) }}</p>
                    <a href="/berita/{{ $berita['slug'] }}" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
