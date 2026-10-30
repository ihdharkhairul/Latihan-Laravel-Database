@extends('layouts.app')

@section('title', 'Form Pelaporan')

@section('content')
    <div class="panel panel-wide">
        <h1>Form Pelaporan Banjir</h1>
        <p class="subtitle">Laporkan kejadian banjir di wilayah kamu beserta foto kondisinya sebagai bukti.</p>

        {{-- enctype wajib ada agar file foto ikut terkirim --}}
        <form action="{{ route('banjir.kirim') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="field">
                <label for="nama_pelapor">Nama Pelapor</label>
                <input type="text" id="nama_pelapor" name="nama_pelapor" placeholder="Nama lengkap" value="{{ old('nama_pelapor') }}">
                @error('nama_pelapor') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label for="no_hp">No. HP</label>
                <input type="text" id="no_hp" name="no_hp" placeholder="Contoh: 081234567890" value="{{ old('no_hp') }}">
                @error('no_hp') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" id="kecamatan" name="kecamatan" placeholder="Contoh: Baleendah" value="{{ old('kecamatan') }}">
                @error('kecamatan') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label for="lokasi">Lokasi Kejadian (Desa / Jalan)</label>
                <input type="text" id="lokasi" name="lokasi" placeholder="Contoh: Jl. Raya Andir No. 10" value="{{ old('lokasi') }}">
                @error('lokasi') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label for="tinggi_air">Tinggi Genangan Air (cm)</label>
                <input type="number" id="tinggi_air" name="tinggi_air" placeholder="Contoh: 50" min="0" value="{{ old('tinggi_air') }}">
                @error('tinggi_air') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label for="tanggal_kejadian">Tanggal Kejadian</label>
                <input type="date" id="tanggal_kejadian" name="tanggal_kejadian" value="{{ old('tanggal_kejadian') }}">
                @error('tanggal_kejadian') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label for="keterangan">Keterangan (opsional)</label>
                <textarea id="keterangan" name="keterangan" placeholder="Kondisi sekitar, jumlah rumah terdampak, dan lainnya">{{ old('keterangan') }}</textarea>
                @error('keterangan') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label for="foto">Foto Kondisi Banjir</label>
                <input type="file" id="foto" name="foto" accept="image/png,image/jpeg">
                <span class="hint">Format jpg, jpeg, atau png. Maksimal 2 MB.</span>
                @error('foto') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-block">Kirim Laporan</button>
        </form>
    </div>
@endsection