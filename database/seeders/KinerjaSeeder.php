<?php

namespace Database\Seeders;

use App\Models\Kinerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KinerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = '{
            "laba_bersih": 1959565707,
            "equity": 87694705743,
            "biaya_operasi": 53280719526,
            "pendapatan_operasi": 55018285233,
            "kas": 10249689595,
            "utang_lancar": 614005000,
            "penerimaan_rek_air": 39468699038,
            "rek_air": 44738998733,
            "aktiva": 88308710743,
            "utang": 614005000,
            "penduduk_terlayani": 89645,
            "penduduk_dalam_wilayah_Kerja_pdam": 202660,
            "pelanggan_bulan_lalu": 19891,
            "pelanggan_bulan_ini": 23797,
            "keluhan_selesai": 160,
            "keluhan": 160,
            "uji_kualitas_memenuhi_syarat": 0,
            "jumlah_uji": 0,
            "air_terjual_domestik": 285130,
            "pelanggan_domestik": 20179,
            "volume_produksi_rill": 7161823,
            "kapasitas_produksi_terpasang": 10722240,
            "volume_distribusi_air": 7161823,
            "air_terjual": 5260359,
            "waktu_distribusi": 620,
            "pelanggan_tekanan_7": 6083,
            "jumlah_pelanggan": 23797,
            "jumlah_meter_air_diganti": 780,
            "jumlah_pegawai": 59,
            "jumlah_pegawai_diklat": 55,
            "biaya_diklat": 800000000,
            "jumlah_biaya_pegawai": 20786565250,
            "tahun": "2022",
            "periode": "Tahunan"
        }';
        // return response()->json(json_decode($data));
        $kinerja = new Kinerja();
        $kinerja->create((array)json_decode($data));
    }
}
