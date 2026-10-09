@props(['type' => 'success', 'message' => ''])

<div class="alert alert-{{ $type }}">
    <strong>{{ $type === 'success' ? 'Berhasil' : 'Gagal' }}:</strong> {{ $message }}
</div>