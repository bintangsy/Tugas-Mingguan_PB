@extends('layouts.main')



@section('content')

<h1>Berita</h1>

@foreach ( $berita as $berita )

<article class="mb-5">

    <h2>{{ $berita['judul'] }}</h3>

    <h3>{{ $berita['penulis'] }}</h3>

    <p>{{ $berita['konten'] }}</p>

    </article>



@endforeach



@endsection