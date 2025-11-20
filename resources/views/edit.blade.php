@extends('layouts.main')

@section('content')
<h1>Tambah Data Mahasiswa</h1>

<div class="card">
  <div class="card-body bg-light">   
    <form action="/editdata/{{ $data['id'] }}" method="POST" enctype="multipart/form-data">
      @csrf
    <form>  
      <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" name="name" id="name" value="{{ $data['nama'] }}" placeholder="Nama lengkap" class="form-control">
      </div>

      <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="number" name="nim" id="nim" value="{{ $data['nim'] }}" placeholder="Nomor induk mahasiswa" class="form-control">
      </div>

      <div class="mb-3">
        <label for="prodi" class="form-label">Program Studi</label>
        <input type="text" name="prodi" id="prodi" value="{{ $data['prodi'] }}" placeholder="Program studi" class="form-control">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" name="email" id="email" value="{{ $data['email'] }}" placeholder="Email" class="form-control">
      </div>

      <div class="mb-3">
        <label for="nohp" class="form-label">No HP</label>
        <input type="number" name="nohp" id="nohp" value="{{ $data['nohp'] }}" placeholder="No HP" class="form-control">
      </div>


      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection
