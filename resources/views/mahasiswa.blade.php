@extends('layouts.main')

@section('content')
<h1 class="text-center"> Data Mahasiswa</h1>
    <div class="row">
        <a href="/tambahmahasiswa"
        <button type="button" class="btn btn-success">Tambah Data</button>
        </a>
<br>
@if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
@endif
        <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">NIM</th>
      <th scope="col">Program Studi</th>
      <th scope="col">Email</th>
      <th scope="col">no. Hp</th>
      <th scope="col">AKSI</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1 ?>
    @foreach ($data as $mahasiswa)
    <tr>
        <th scope="row"><?php echo $i?></th>
        <td>{{$mahasiswa["name"]}}</td>
        <td>{{$mahasiswa["nim"]}}</td>
        <td>{{$mahasiswa["prodi"]}}</td>
        <td>{{$mahasiswa["email"]}}</td>
        <td>{{$mahasiswa["nohp"]}}</td>
        <td>
            <a href="tampildata/{{ $mahasiswa['id'] }}" class="btn btn-primary">EDIT</a>
            <a href="deletedata/{{ $mahasiswa['id'] }}" class="btn btn-danger" onclick="return conform('yakin ingin menghapus data ini?')">HAPUS</a>"
        </td>
        <?php $i++?>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection