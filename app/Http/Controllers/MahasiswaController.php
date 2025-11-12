<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    // Menampilkan seluruh data mahasiswa
    public function index()
    {
        return view('mahasiswa', [
            'data' => Mahasiswa::all(),
            'title' => 'Data Mahasiswa',
        ]);
    }

    // Menampilkan form tambah mahasiswa
    public function tambahmahasiswa() 
    {
        return view('tambahmahasiswa', [
            'title' => 'Tambah Data Mahasiswa',
        ]);
    }

    // Menyimpan data mahasiswa baru
    public function insertdata(Request $request)
    {
        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa')
                         ->with('success', 'Data Berhasil Ditambahkan');
    }
}
