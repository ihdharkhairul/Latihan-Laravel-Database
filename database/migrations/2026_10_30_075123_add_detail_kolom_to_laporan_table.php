<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('laporan', function (Blueprint $table) {
            // Nama kolom disesuaikan dengan ketentuan tugas (tinggi_air, dalam cm)
            $table->renameColumn('tinggi_genangan', 'tinggi_air');
        });

        Schema::table('laporan', function (Blueprint $table) {
            // Dibuat nullable agar data lama tetap valid.
            // Kewajiban isi untuk laporan baru dijaga oleh validasi di controller.
            $table->string('no_hp', 20)->nullable()->after('nama_pelapor');
            $table->string('kecamatan')->nullable()->after('lokasi');
            $table->text('keterangan')->nullable()->after('tinggi_air');
            $table->string('foto')->nullable()->after('keterangan');        // path foto di disk public
            $table->string('status')->default('Menunggu')->after('foto');  // Menunggu / Diproses / Selesai
        });
    }

    public function down(): void
    {
        Schema::table('laporan', function (Blueprint $table) {
            $table->dropColumn(['no_hp', 'kecamatan', 'keterangan', 'foto', 'status']);
        });

        Schema::table('laporan', function (Blueprint $table) {
            $table->renameColumn('tinggi_air', 'tinggi_genangan');
        });
    }
};