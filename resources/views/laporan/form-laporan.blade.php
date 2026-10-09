@extends('layouts.app')

@section('title', 'Form Pelaporan')

@section('content')
    <div class="panel">
        <h1>Form Pelaporan Banjir</h1>
        <p class="subtitle">Laporkan kejadian banjir di wilayah kamu secara cepat.</p>

        <form action="{{ route('banjir.kirim') }}" method="POST">
            @csrf

            <div class="field">
                <label for="nama_pelapor">Nama Pelapor</label>
                <input type="text" id="nama_pelapor" name="nama_pelapor" placeholder="Nama lengkap" value="{{ old('nama_pelapor') }}">
                @error('nama_pelapor') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label for="lokasi">Lokasi Kejadian (Kecamatan/Desa)</label>
                <input type="text" id="lokasi" name="lokasi" placeholder="Contoh: Baleendah / Andir" value="{{ old('lokasi') }}">
                @error('lokasi') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label for="tinggi_genangan">Tinggi Genangan Air (cm)</label>
                <input type="number" id="tinggi_genangan" name="tinggi_genangan" placeholder="Contoh: 50" value="{{ old('tinggi_genangan') }}">
                @error('tinggi_genangan') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label for="tanggal_kejadian">Tanggal Kejadian</label>
                <input type="date" id="tanggal_kejadian" name="tanggal_kejadian" value="{{ old('tanggal_kejadian') }}">
                @error('tanggal_kejadian') <span class="error-text">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-block">Kirim Laporan</button>
        </form>
    </div>
@endsection