<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class LaporanController extends Controller
{
    // READ: daftar laporan (5 data per halaman, terbaru di atas)
    public function index()
    {
        $laporan = Laporan::latest()->paginate(5);

        return view('laporan.index', compact('laporan'));
    }

    // READ: detail satu laporan
    public function show(Laporan $laporan)
    {
        return view('laporan.show', compact('laporan'));
    }

    // UPDATE: form edit
    public function edit(Laporan $laporan)
    {
        return view('laporan.edit', compact('laporan'));
    }

    // UPDATE: simpan perubahan (foto baru bersifat opsional)
    public function update(Request $request, Laporan $laporan)
    {
        $validated = $request->validate([
            'nama_pelapor'     => 'required|string|max:255',
            'no_hp'            => 'required|string|max:20',
            'lokasi'           => 'required|string|max:255',
            'kecamatan'        => 'required|string|max:255',
            'tinggi_air'       => 'required|integer|min:0',
            'tanggal_kejadian' => 'required|date',
            'keterangan'       => 'nullable|string',
            'status'           => ['required', Rule::in(Laporan::STATUS)],
            'foto'             => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat jpg, jpeg, atau png.',
            'foto.max'   => 'Ukuran foto maksimal 2 MB.',
        ]);

        unset($validated['foto']);

        if ($request->hasFile('foto')) {
            if ($laporan->foto) {
                Storage::disk('public')->delete($laporan->foto); 
            }
            $validated['foto'] = $request->file('foto')->store('laporan', 'public');
        }

        $laporan->update($validated);

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil diperbarui.');
    }

    public function destroy(Laporan $laporan)
    {
        if ($laporan->foto) {
            Storage::disk('public')->delete($laporan->foto);
        }

        $laporan->delete();

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil dihapus.');
    }
}