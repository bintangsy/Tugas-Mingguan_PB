<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::all();
        return view('Mahasiswa', compact('data'), [
            
        "title" => " Data Mahasiswa",
    ]);
    }

    public function tambahmahasiswa()
    {
        return view('mahasiswa.tambahmahasiswa', [
            "title" => "Tambah Data Mahasiswa",
        ]);
    }

    public function insertdata(Request $request)
    {
        $data = Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa')
            ->with('success', 'Data Berhasil Ditambahkan');
    }

    public function tampildata($id)
    {
        $data = Mahasiswa::find($id);
        return view("edit",[
            "title" => "Edit Data Mahasiswa",
            "data" => $data,
        ]);
    }

    public function editdata(Request $request, $id)
    {
        $data = Mahasiswa::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('mahasiswa')
            ->with('success', 'Data Berhasil Diedit');
    }

    public function deletedata($id)
    {
        $data = Mahasiswa::find($id);
        
        $data->delete();

        return redirect()->route('mahasiswa')
            ->with('success', 'Data Berhasil Dihapus');
    }

}
