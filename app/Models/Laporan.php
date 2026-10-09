<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';

    protected $fillable = [
        'nama_pelapor',
        'lokasi',
        'tinggi_genangan',
        'tanggal_kejadian',
    ];

    protected $casts = [
        'tanggal_kejadian' => 'date',
    ];

    public function getStatusAttribute(): string
    {
        if ($this->tinggi_genangan < 30) {
            return 'Waspada';
        } elseif ($this->tinggi_genangan <= 70) {
            return 'Siaga';
        }
        return 'Awas';
    }
}