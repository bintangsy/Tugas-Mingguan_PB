@extends('layouts.main')

@section('content')
        <article>
            <h1>{{ $new_berita["judul"] }}</h1>
            <h3>{{ $new_berita["penulis"] }}</h3>
            <p>{{ $new_berita["konten"] }}</p>
        </article>

        <a href="/berita">Kembali ke halaman berita</a>
@endsection