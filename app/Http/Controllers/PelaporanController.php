<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class PelaporanController extends Controller
{
    // Menampilkan form pelaporan untuk warga
    public function form()
    {
        return view('laporan.form-laporan');
    }

    // Memvalidasi dan menyimpan laporan baru beserta foto bukti
    public function kirim(Request $request)
    {
        $validated = $request->validate([
            'nama_pelapor'     => 'required|string|max:255',
            'no_hp'            => 'required|string|max:20',
            'lokasi'           => 'required|string|max:255',
            'kecamatan'        => 'required|string|max:255',
            'tinggi_air'       => 'required|integer|min:0',
            'tanggal_kejadian' => 'required|date|before_or_equal:today',
            'keterangan'       => 'nullable|string',
            'foto'             => 'required|image|mimes:jpg,jpeg,png|max:2048', // maks. 2 MB
        ], [
            'foto.required' => 'Foto kondisi banjir wajib diunggah sebagai bukti.',
            'foto.image'    => 'File harus berupa gambar.',
            'foto.mimes'    => 'Foto harus berformat jpg, jpeg, atau png.',
            'foto.max'      => 'Ukuran foto maksimal 2 MB.',
        ]);

        // Simpan ke storage/app/public/laporan, lalu simpan path-nya ke database
        $validated['foto'] = $request->file('foto')->store('laporan', 'public');

        Laporan::create($validated); // kolom status otomatis bernilai "Menunggu"

        return redirect()->route('banjir.form')
            ->with('success', 'Laporan banjir berhasil dikirim. Terima kasih!');
    }
}