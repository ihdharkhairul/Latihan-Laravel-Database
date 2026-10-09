<?php

namespace App\Http\Controllers;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
class MahasiswaController extends Controller
{
    // Tampil Form Input
    public function form() 
    {
        return view('form');
    }

    // simpan data dari form
    public function simpan(Request $request)
    {
        Mahasiswa::create([
            'nama'    => $request->nama,
            'nim'     => $request->nim,
            'jurusan' => $request->jurusan,
        ]);
        return "Data mahasiswa berhasi di simpan";
    }

    // tampilakn daftar mahasiswa
    public function daftar()
    {
        $data = Mahasiswa::all();
        return view('mahasiswa', ['mahasiswa' => $data]);
    }
}
