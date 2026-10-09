<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // Tampilkan form laporan
    public function form()
    {
        return view('laporan.form-laporan');
    }

    // Simpan laporan ke database
    public function simpan(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pelapor'     => 'required|string|max:255',
            'lokasi'           => 'required|string|max:255',
            'tinggi_genangan'  => 'required|integer|min:0',
            'tanggal_kejadian' => 'required|date',
        ]);

        $laporan = Laporan::create($validatedData);

        return view('laporan.konfirmasi', ['laporan' => $laporan]);
    }

    // Tampilkan daftar laporan dari database
    public function daftar()
    {
        $laporan = Laporan::all();
        return view('laporan.daftar-laporan', ['laporan' => $laporan]);
    }
}