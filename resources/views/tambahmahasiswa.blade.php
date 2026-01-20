@extends('layouts.main')

@section('content')
<h1>Tambah Data Mahasiswa</h1>

<div class="card">
  <div class="card-body bg-light">   
    <form action="{{ route('insertdata') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" name="name" id="name" placeholder="Nama lengkap" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="number" name="nim" id="nim" placeholder="Nomor induk mahasiswa" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="prodi" class="form-label">Program Studi</label>
        <input type="text" name="prodi" id="prodi" placeholder="Program studi" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" placeholder="Email" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="nohp" class="form-label">No HP</label>
        <input type="number" name="nohp" id="nohp" placeholder="No HP" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection
