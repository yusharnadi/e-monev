<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kinerjas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('laba_bersih');
            $table->bigInteger('equity');
            $table->bigInteger('biaya_operasi');
            $table->bigInteger('pendapatan_operasi');
            $table->bigInteger('kas');
            $table->bigInteger('utang_lancar');
            $table->bigInteger('penerimaan_rek_air');
            $table->bigInteger('rek_air');
            $table->bigInteger('aktiva');
            $table->bigInteger('penduduk_terlayani');
            $table->bigInteger('penduduk_dalam_wilayah_Kerja_pdam');
            $table->bigInteger('pelanggan_bulan_lalu');
            $table->bigInteger('pelanggan_bulan_ini');
            $table->bigInteger('keluhan_selesai');
            $table->bigInteger('keluhan');
            $table->bigInteger('uji_kualitas_memenuhi_syarat');
            $table->bigInteger('jumlah_uji');
            $table->bigInteger('air_terjual_domestik');
            $table->bigInteger('pelanggan_domestik');
            $table->bigInteger('volume_produksi_rill');
            $table->bigInteger('kapasitas_produksi_terpasang');
            $table->bigInteger('volume_distribusi_air');
            $table->bigInteger('air_terjual');
            $table->bigInteger('waktu_distribusi');
            $table->bigInteger('pelanggan_tekanan_7');
            $table->bigInteger('jumlah_pelanggan');
            $table->bigInteger('jumlah_meter_air_diganti');
            $table->bigInteger('jumlah_pegawai');
            $table->bigInteger('jumlah_pegawai_diklat');
            $table->bigInteger('biaya_diklat');
            $table->bigInteger('jumlah_biaya_pegawai');
            $table->string('tahun');
            $table->smallInteger('periode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kinerjas');
    }
};
