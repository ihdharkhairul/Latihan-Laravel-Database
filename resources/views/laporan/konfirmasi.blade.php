@extends('layouts.app')

@section('title', 'Laporan Diterima')

@section('content')
    <div class="panel">
        <h1>Laporan Diterima</h1>

        <x-alert type="success" message="Laporan banjir kamu berhasil dikirim. Terima kasih!" />

        <div class="detail">
            <span>Nama Pelapor</span>
            <strong>{{ $laporan->nama_pelapor }}</strong>
        </div>

        <div class="detail">
            <span>Lokasi Kejadian</span>
            <strong>{{ $laporan->lokasi }}</strong>
        </div>

        <div class="detail">
            <span>Tinggi Genangan Air</span>
            <strong>{{ $laporan->tinggi_genangan }} cm ({{ $laporan->status }})</strong>
        </div>

        <div class="detail">
            <span>Tanggal Kejadian</span>
            <strong>{{ $laporan->tanggal_kejadian->format('d M Y') }}</strong>
        </div>

        <p style="margin-top: 22px;">
            <a href="{{ route('banjir.form') }}" class="link-back">&larr; Buat laporan baru</a>
        </p>
    </div>
@endsection