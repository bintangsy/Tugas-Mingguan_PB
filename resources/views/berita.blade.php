@extends('layouts.main')

@section('content')
    <h1>Berita</h1>
    @foreach ( $beritas as $berita )
    <article class="mb-5">

        <a href="/berita/{{ $berita ['slug'] }}">
        <h2>{{ $berita['judul'] }}</h2>
        </a>
        <h3>{{ $berita['penulis'] }}</h3>
        <p>{{ $berita['konten'] }}</p>
        </article>
@endforeach
@endsection