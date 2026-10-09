<div class="laporan-card">
    <div class="card-top">
        <h3>{{ $item->lokasi }}</h3>
        <span class="badge badge-{{ strtolower($item->status) }}">{{ $item->status }}</span>
    </div>

    <div class="meta"><span>Pelapor</span> <b>{{ $item->nama_pelapor }}</b></div>
    <div class="meta"><span>Tinggi genangan</span> <b>{{ $item->tinggi_genangan }} cm</b></div>
    <div class="meta"><span>Tanggal kejadian</span> <b>{{ $item->tanggal_kejadian->format('d M Y') }}</b></div>
</div>