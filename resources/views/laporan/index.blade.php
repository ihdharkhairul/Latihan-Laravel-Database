@extends('layouts.app')

@section('title', 'Daftar Laporan')

@section('content')
    <div class="page-head">
        <h2>Daftar Laporan Banjir</h2>
        <p class="subtitle">Kelola laporan dari warga Kabupaten Bandung.</p>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Pelapor</th>
                    <th>Lokasi</th>
                    <th>Tinggi Air</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($laporan as $item)
                    <tr>
                        {{-- Nomor tetap berlanjut di halaman pagination berikutnya --}}
                        <td>{{ $laporan->firstItem() + $loop->index }}</td>

                        <td>
                            @if ($item->foto)
                                <a href="{{ $item->foto_url }}" target="_blank">
                                    <img src="{{ $item->foto_url }}" alt="Foto laporan {{ $item->nama_pelapor }}" class="thumb">
                                </a>
                            @else
                                <div class="thumb-kosong">Tidak ada</div>
                            @endif
                        </td>

                        <td>
                            {{ $item->nama_pelapor }}<br>
                            <small style="color: var(--muted);">{{ $item->tanggal_kejadian->format('d M Y') }}</small>
                        </td>

                        <td>
                            {{ $item->kecamatan ?? '-' }}<br>
                            <small style="color: var(--muted);">{{ $item->lokasi }}</small>
                        </td>

                        <td>
                            {{ $item->tinggi_air }} cm<br>
                            <span class="badge badge-{{ strtolower($item->tingkat) }}">{{ $item->tingkat }}</span>
                        </td>

                        <td>
                            <span class="badge badge-{{ strtolower($item->status) }}">{{ $item->status }}</span>
                        </td>

                        <td>
                            <div class="aksi">
                                <a href="{{ route('laporan.show', $item) }}" class="btn-sm">Lihat</a>
                                <a href="{{ route('laporan.edit', $item) }}" class="btn-sm">Edit</a>
                                <form action="{{ route('laporan.destroy', $item) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-sm btn-hapus"
                                            onclick="return confirm('Yakin ingin menghapus laporan ini?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="empty">Belum ada laporan banjir.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($laporan->count() > 0)
        <p class="pager-info">
            Menampilkan {{ $laporan->firstItem() }}-{{ $laporan->lastItem() }} dari {{ $laporan->total() }} laporan
        </p>
    @endif

    {{ $laporan->links() }}
@endsection