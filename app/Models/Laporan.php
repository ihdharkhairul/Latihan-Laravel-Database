<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';

    // Pilihan status penanganan yang dikelola petugas
    public const STATUS = ['Menunggu', 'Diproses', 'Selesai'];

    protected $fillable = [
        'nama_pelapor',
        'no_hp',
        'lokasi',
        'kecamatan',
        'tinggi_air',
        'tanggal_kejadian',
        'keterangan',
        'foto',
        'status',
    ];

    protected $casts = [
        'tanggal_kejadian' => 'date',
    ];

    // Tingkat bahaya dihitung dari tinggi air (berbeda dengan kolom status penanganan)
    public function getTingkatAttribute(): string
    {
        if ($this->tinggi_air < 30) {
            return 'Waspada';
        } elseif ($this->tinggi_air <= 70) {
            return 'Siaga';
        }
        return 'Awas';
    }

    // URL foto yang dapat dibuka di browser (butuh php artisan storage:link)
    public function getFotoUrlAttribute(): ?string
    {
        return $this->foto ? asset('storage/' . $this->foto) : null;
    }
}   