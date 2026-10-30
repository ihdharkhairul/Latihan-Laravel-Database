@extends('layouts.app')

@section('title', 'Edit Laporan')

@section('content')
    <div class="panel panel-wide">
        <h1>Edit Laporan</h1>
        <p class="subtitle">Perbarui data laporan, ganti foto, atau ubah status penanganan.</p>

        <form action="{{ route('laporan.update', $laporan) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- Mengubah request menjadi PUT agar menuju method update() --}}

            <div class="field">
                <label for="status">Status Penanganan</label>
                <select id="status" name="status">
                    @foreach (\App\Models\Laporan::STATUS as $pilihan)
                        <option value="{{ $pilihan }}" @selected(old('status', $laporan->status) === $pilihan)>{{ $pilihan }}</option>
                    @endforeach
                </select>
                @error('status') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label for="nama_pelapor">Nama Pelapor</label>
                <input type="text" id="nama_pelapor" name="nama_pelapor" value="{{ old('nama_pelapor', $laporan->nama_pelapor) }}">
                @error('nama_pelapor') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label for="no_hp">No. HP</label>
                <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', $laporan->no_hp) }}">
                @error('no_hp') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" id="kecamatan" name="kecamatan" value="{{ old('kecamatan', $laporan->kecamatan) }}">
                @error('kecamatan') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label for="lokasi">Lokasi Kejadian (Desa / Jalan)</label>
                <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi', $laporan->lokasi) }}">
                @error('lokasi') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label for="tinggi_air">Tinggi Genangan Air (cm)</label>
                <input type="number" id="tinggi_air" name="tinggi_air" min="0" value="{{ old('tinggi_air', $laporan->tinggi_air) }}">
                @error('tinggi_air') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label for="tanggal_kejadian">Tanggal Kejadian</label>
                <input type="date" id="tanggal_kejadian" name="tanggal_kejadian"
                       value="{{ old('tanggal_kejadian', $laporan->tanggal_kejadian->format('Y-m-d')) }}">
                @error('tanggal_kejadian') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label for="keterangan">Keterangan (opsional)</label>
                <textarea id="keterangan" name="keterangan">{{ old('keterangan', $laporan->keterangan) }}</textarea>
                @error('keterangan') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label for="foto">Foto Bukti</label>
                @if ($laporan->foto)
                    <img src="{{ $laporan->foto_url }}" alt="Foto saat ini" class="thumb" style="width: 160px; height: 120px; margin-bottom: 10px;">
                @else
                    <p class="hint" style="margin-bottom: 8px;">Belum ada foto.</p>
                @endif
                <input type="file" id="foto" name="foto" accept="image/png,image/jpeg">
                <span class="hint">Kosongkan jika tidak ingin mengganti foto. Format jpg, jpeg, atau png, maksimal 2 MB.</span>
                @error('foto') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="aksi">
                <button type="submit" class="btn">Simpan Perubahan</button>
                <a href="{{ route('laporan.index') }}" class="link-back" style="margin-left: 8px;">Batal</a>
            </div>
        </form>
    </div>
@endsection