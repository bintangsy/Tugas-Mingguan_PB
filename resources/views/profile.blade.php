@extends('layouts.main')

@section('content')
<h1>Profile</h1>

<h3>{{ $nama }}</h3>
<p>{{ $nohp }}</p>
<img src="{{ $foto }}" alt="Foto Profil" style="max-width: 200px;">
@endsection