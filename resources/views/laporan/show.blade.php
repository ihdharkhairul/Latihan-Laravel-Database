@extends('layouts.app')

@section('title', 'Detail Laporan')

@section('content')
    <div class="panel panel-wide">
        <h1>Detail Laporan</h1>
        <p class="subtitle">Laporan #{{ $laporan->id }}, dikirim {{ $laporan->created_at->format('d M Y H:i') }}.</p>

        <div class="detail">
            <span>Nama Pelapor</span>
            <strong>{{ $laporan->nama_pelapor }}</strong>
        </div>

        <div class="detail">
            <span>No. HP</span>
            <strong>{{ $laporan->no_hp ?? '-' }}</strong>
        </div>

        <div class="detail">
            <span>Kecamatan</span>
            <strong>{{ $laporan->kecamatan ?? '-' }}</strong>
        </div>

        <div class="detail">
            <span>Lokasi Kejadian</span>
            <strong>{{ $laporan->lokasi }}</strong>
        </div>

        <div class="detail">
            <span>Tinggi Genangan Air</span>
            <strong>
                {{ $laporan->tinggi_air }} cm
                <span class="badge badge-{{ strtolower($laporan->tingkat) }}">{{ $laporan->tingkat }}</span>
            </strong>
        </div>

        <div class="detail">
            <span>Tanggal Kejadian</span>
            <strong>{{ $laporan->tanggal_kejadian->format('d M Y') }}</strong>
        </div>

        <div class="detail">
            <span>Status Penanganan</span>
            <strong>
                <span class="badge badge-{{ strtolower($laporan->status) }}">{{ $laporan->status }}</span>
            </strong>
        </div>

        <div class="detail">
            <span>Keterangan</span>
            <strong>{{ $laporan->keterangan ?? '-' }}</strong>
        </div>

        <div style="margin-top: 18px;">
            <span style="color: var(--muted); font-size: 14px;">Foto Bukti</span>
            @if ($laporan->foto)
                <img src="{{ $laporan->foto_url }}" alt="Foto laporan {{ $laporan->nama_pelapor }}" class="foto-besar">
            @else
                <p style="color: var(--muted); margin-top: 6px;">Tidak ada foto.</p>
            @endif
        </div>

        <div class="aksi" style="margin-top: 26px;">
            <a href="{{ route('laporan.edit', $laporan) }}" class="btn-sm">Edit</a>
            <form action="{{ route('laporan.destroy', $laporan) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-sm btn-hapus"
                        onclick="return confirm('Yakin ingin menghapus laporan ini?')">Hapus</button>
            </form>
            <a href="{{ route('laporan.index') }}" class="link-back" style="margin-left: 8px;">&larr; Kembali ke daftar</a>
        </div>
    </div>
@endsection