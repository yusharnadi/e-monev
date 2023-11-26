<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

function set_active($uri, $output = 'active')
{
    if (is_array($uri)) {
        foreach ($uri as $u) {
            if (Route::is($u)) {
                return $output;
            }
        }
    } else {
        if (Route::is($uri)) {
            return $output;
        }
    }
}


function set_active_wizard($uri, $output = 'wizard-step-warning')
{
    if (is_array($uri)) {
        foreach ($uri as $u) {
            if (Route::is($u)) {
                return $output;
            }
        }
    } else {
        if (Route::is($uri)) {
            return $output;
        }
    }
}

function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}

function format_angka($angka)
{
    $angka = number_format($angka, 0, ',', '.');
    return $angka;
}


function uploadFile($file)
{
    $name = $file->hashName();

    try {
        //        $file->move('uploads', $name);
        $file->move(public_path("uploads/"), $name);
    } catch (\Exception $th) {
        Log::error($th->getMessage());
    }

    return $name;
}

function deleteFile($file)
{
    return File::delete(public_path("uploads/" . $file));
}

function calculateBpspam($kinerja)
{
    $roe_kondisi = 0;
    $roe_nilai = 0;
    $roe_bobot = 0;
    $rasio_operasi_kondisi = 0;
    $rasio_operasi_bobot = 0;
    $rasio_operasi_nilai = 0;
    $rasio_kas_kondisi = 0;
    $rasio_kas_bobot = 0;
    $rasio_kas_nilai = 0;
    $efektifitas_penagihan_kondisi = 0;
    $efektifitas_penagihan_bobot = 0;
    $efektifitas_penagihan_nilai = 0;
    $solvabilitas_kondisi = 0;
    $solvabilitas_nilai = 0;
    $solvabilitas_bobot = 0;

    $cakupan_pelayanan_kondisi = 0;
    $cakupan_pelayanan_nilai = 0;
    $cakupan_pelayanan_bobot = 0;
    $pertumbuhan_pelanggan_kondisi = 0;
    $pertumbuhan_pelanggan_nilai = 0;
    $pertumbuhan_pelanggan_bobot = 0;
    $penyelesaian_pengaduan_kondisi = 0;
    $penyelesaian_pengaduan_nilai = 0;
    $penyelesaian_pengaduan_bobot = 0;
    $kualitas_air_kondisi = 0;
    $kualitas_air_nilai = 0;
    $kualitas_air_bobot = 0;
    $air_domestik_kondisi = 0;
    $air_domestik_nilai = 0;
    $air_domestik_bobot = 0;

    $efisiensi_produksi_kondisi = 0;
    $efisiensi_produksi_nilai = 0;
    $efisiensi_produksi_bobot = 0;
    $tingkat_kehilangan_kondisi = 0;
    $tingkat_kehilangan_nilai = 0;
    $tingkat_kehilangan_bobot = 0;
    $jam_operasi_kondisi = 0;
    $jam_operasi_nilai = 0;
    $jam_operasi_bobot = 0;
    $tekanan_air_kondisi = 0;
    $tekanan_air_nilai = 0;
    $tekanan_air_bobot = 0;
    $penggantian_kondisi = 0;
    $penggantian_nilai = 0;
    $penggantian_bobot = 0;

    $rasio_pegawai_kondisi = 0;
    $rasio_pegawai_nilai = 0;
    $rasio_pegawai_bobot = 0;

    $rasio_diklat_kondisi = 0;
    $rasio_diklat_nilai = 0;
    $rasio_diklat_bobot = 0;

    $biaya_diklat_kondisi = 0;
    $biaya_diklat_nilai = 0;
    $biaya_diklat_bobot = 0;

    $bobot_keuangan = 0;
    $bobot_pelayanan = 0;
    $bobot_produksi = 0;
    $bobot_sdm = 0;

    $kategori_penilaian = '';

    if (isset($kinerja) && $kinerja !== null) {

        if ($kinerja->equity !== 0) {
            $roe_kondisi = round(($kinerja->laba_bersih / $kinerja->equity) * 100, 2);
        }

        if ($roe_kondisi <= 0) {
            $roe_nilai = 1;
        } elseif ($roe_kondisi < 3) {
            $roe_nilai = 2;
        } elseif ($roe_kondisi < 7) {
            $roe_nilai = 3;
        } elseif ($roe_kondisi < 10) {
            $roe_nilai = 4;
        } else {
            $roe_nilai = 5;
        }

        $roe_bobot = 0.055 * $roe_nilai;

        // END ROE 

        $rasio_operasi_kondisi = ($kinerja->pendapatan_operasi !== 0) ? round($kinerja->biaya_operasi / $kinerja->pendapatan_operasi, 2) : 0;

        if ($rasio_operasi_kondisi > 1) {
            $rasio_operasi_nilai = 1;
        } elseif ($rasio_operasi_kondisi > 0.85) {
            $rasio_operasi_nilai = 2;
        } elseif ($rasio_operasi_kondisi > 0.65) {
            $rasio_operasi_nilai = 3;
        } elseif ($rasio_operasi_kondisi > 0.5) {
            $rasio_operasi_nilai = 4;
        } else {
            $rasio_operasi_nilai = 5;
        }

        $rasio_operasi_bobot = 0.055 * $rasio_operasi_nilai;

        // END RASIO OPERASI
        $rasio_kas_kondisi = ($kinerja->utang_lancar !== 0) ? round(($kinerja->kas / $kinerja->utang_lancar) * 100, 2) : 0;


        if ($rasio_kas_kondisi < 40) {
            $rasio_kas_nilai = 1;
        } elseif ($rasio_kas_kondisi < 60) {
            $rasio_kas_nilai = 2;
        } elseif ($rasio_kas_kondisi < 80) {
            $rasio_kas_nilai = 3;
        } elseif ($rasio_kas_kondisi < 100) {
            $rasio_kas_nilai = 4;
        } else {
            $rasio_kas_nilai = 5;
        }

        $rasio_kas_nilai = ($kinerja->utang_lancar === 0) ? 5 : $rasio_kas_nilai;

        $rasio_kas_bobot = 0.055 * $rasio_kas_nilai;

        // END RASIO KAS 

        $efektifitas_penagihan_kondisi = ($kinerja->rek_air !== 0) ? round(($kinerja->penerimaan_rek_air / $kinerja->rek_air) * 100, 2) : 0;

        if ($efektifitas_penagihan_kondisi < 75) {
            $efektifitas_penagihan_nilai = 1;
        } elseif ($efektifitas_penagihan_kondisi < 80) {
            $efektifitas_penagihan_nilai = 2;
        } elseif ($efektifitas_penagihan_kondisi < 85) {
            $efektifitas_penagihan_nilai = 3;
        } elseif ($efektifitas_penagihan_kondisi < 90) {
            $efektifitas_penagihan_nilai = 4;
        } else {
            $efektifitas_penagihan_nilai = 5;
        }

        $efektifitas_penagihan_bobot = 0.055 * $efektifitas_penagihan_nilai;

        // END EFEKTIFIRTAS PENAGIHAN 

        $solvabilitas_kondisi = ($kinerja->utang !== 0) ? round(($kinerja->aktiva / $kinerja->utang) * 100, 2) : 0;

        if ($solvabilitas_kondisi < 100) {
            $solvabilitas_nilai = 1;
        } elseif ($solvabilitas_kondisi < 135) {
            $solvabilitas_nilai = 2;
        } elseif ($solvabilitas_kondisi < 170) {
            $solvabilitas_nilai = 3;
        } elseif ($solvabilitas_kondisi < 200) {
            $solvabilitas_nilai = 4;
        } else {
            $solvabilitas_nilai = 5;
        }

        $solvabilitas_nilai = ($kinerja->utang === 0) ? 5 : $solvabilitas_nilai;

        $solvabilitas_bobot = 0.03 * $solvabilitas_nilai;

        // END SOLVABILITAS 

        $cakupan_pelayanan_kondisi = ($kinerja->penduduk_dalam_wilayah_Kerja_pdam !== 0) ? round(($kinerja->penduduk_terlayani / $kinerja->penduduk_dalam_wilayah_Kerja_pdam) * 100, 2) : 0;

        if ($cakupan_pelayanan_kondisi < 20) {
            $cakupan_pelayanan_nilai = 1;
        } elseif ($cakupan_pelayanan_kondisi < 40) {
            $cakupan_pelayanan_nilai = 2;
        } elseif ($cakupan_pelayanan_kondisi < 60) {
            $cakupan_pelayanan_nilai = 3;
        } elseif ($cakupan_pelayanan_kondisi < 80) {
            $cakupan_pelayanan_nilai = 4;
        } else {
            $cakupan_pelayanan_nilai = 5;
        }

        $cakupan_pelayanan_bobot = 0.05 * $cakupan_pelayanan_nilai;

        // END Cakupan Pelayanan

        $pertumbuhan_pelanggan_kondisi = ($kinerja->pelanggan_bulan_lalu !== 0) ? round((($kinerja->pelanggan_bulan_ini - $kinerja->pelanggan_bulan_lalu) / $kinerja->pelanggan_bulan_lalu) * 100, 2) : 0;

        if ($pertumbuhan_pelanggan_kondisi < 4) {
            $pertumbuhan_pelanggan_nilai = 1;
        } elseif ($pertumbuhan_pelanggan_kondisi < 6) {
            $pertumbuhan_pelanggan_nilai = 2;
        } elseif ($pertumbuhan_pelanggan_kondisi < 8) {
            $pertumbuhan_pelanggan_nilai = 3;
        } elseif ($pertumbuhan_pelanggan_kondisi < 10) {
            $pertumbuhan_pelanggan_nilai = 4;
        } else {
            $pertumbuhan_pelanggan_nilai = 5;
        }

        $pertumbuhan_pelanggan_bobot = 0.05 * $pertumbuhan_pelanggan_nilai;

        // END Pertunbuhan Pelanggan

        $penyelesaian_pengaduan_kondisi = ($kinerja->keluhan !== 0) ? round(($kinerja->keluhan_selesai / $kinerja->keluhan) * 100, 2) : 0;

        if ($penyelesaian_pengaduan_kondisi < 20) {
            $penyelesaian_pengaduan_nilai = 1;
        } elseif ($penyelesaian_pengaduan_kondisi < 40) {
            $penyelesaian_pengaduan_nilai = 2;
        } elseif ($penyelesaian_pengaduan_kondisi < 60) {
            $penyelesaian_pengaduan_nilai = 3;
        } elseif ($penyelesaian_pengaduan_kondisi < 80) {
            $penyelesaian_pengaduan_nilai = 4;
        } else {
            $penyelesaian_pengaduan_nilai = 5;
        }

        $penyelesaian_pengaduan_bobot = 0.025 * $penyelesaian_pengaduan_nilai;

        // END PENYELESAIN PENGADUAN

        $kualitas_air_kondisi = ($kinerja->jumlah_uji !== 0) ? round(($kinerja->uji_kualitas_memenuhi_syarat / $kinerja->jumlah_uji) * 100, 2) : 0;

        if ($kualitas_air_kondisi < 20) {
            $kualitas_air_nilai = 1;
        } elseif ($kualitas_air_kondisi < 40) {
            $kualitas_air_nilai = 2;
        } elseif ($kualitas_air_kondisi < 60) {
            $kualitas_air_nilai = 3;
        } elseif ($kualitas_air_kondisi < 80) {
            $kualitas_air_nilai = 4;
        } else {
            $kualitas_air_nilai = 5;
        }

        $kualitas_air_bobot = 0.075 * $kualitas_air_nilai;

        // END kualitas AIR

        $air_domestik_kondisi = ($kinerja->pelanggan_domestik !== 0) ? round($kinerja->air_terjual_domestik / $kinerja->pelanggan_domestik / 12, 2) : 0;

        if ($air_domestik_kondisi < 15) {
            $air_domestik_nilai = 1;
        } elseif ($air_domestik_kondisi < 20) {
            $air_domestik_nilai = 2;
        } elseif ($air_domestik_kondisi < 25) {
            $air_domestik_nilai = 3;
        } elseif ($air_domestik_kondisi < 30) {
            $air_domestik_nilai = 4;
        } else {
            $air_domestik_nilai = 5;
        }

        $air_domestik_bobot = 0.05 * $air_domestik_nilai;

        // END AIR DOMESTIK

        $efisiensi_produksi_kondisi = ($kinerja->kapasitas_produksi_terpasang !== 0) ? round(($kinerja->volume_produksi_rill / $kinerja->kapasitas_produksi_terpasang) * 100, 2) : 0;

        if ($efisiensi_produksi_kondisi < 60) {
            $efisiensi_produksi_nilai = 1;
        } elseif ($efisiensi_produksi_kondisi < 70) {
            $efisiensi_produksi_nilai = 2;
        } elseif ($efisiensi_produksi_kondisi < 80) {
            $efisiensi_produksi_nilai = 3;
        } elseif ($efisiensi_produksi_kondisi < 90) {
            $efisiensi_produksi_nilai = 4;
        } else {
            $efisiensi_produksi_nilai = 5;
        }

        $efisiensi_produksi_bobot = 0.07 * $efisiensi_produksi_nilai;

        // END EFISIENSI PRODUKSI

        $air_hilang = $kinerja->volume_distribusi_air - $kinerja->air_terjual;
        $tingkat_kehilangan_kondisi = ($kinerja->volume_distribusi_air !== 0) ? round(($air_hilang / $kinerja->volume_distribusi_air) * 100, 2) : 0;

        if ($tingkat_kehilangan_kondisi <= 25) {
            $tingkat_kehilangan_nilai = 5;
        } elseif ($tingkat_kehilangan_kondisi <= 30) {
            $tingkat_kehilangan_nilai = 4;
        } elseif ($tingkat_kehilangan_kondisi <= 35) {
            $tingkat_kehilangan_nilai = 3;
        } elseif ($tingkat_kehilangan_kondisi <= 40) {
            $tingkat_kehilangan_nilai = 2;
        } else {
            $tingkat_kehilangan_nilai = 1;
        }

        $tingkat_kehilangan_bobot = 0.07 * $tingkat_kehilangan_nilai;

        // END TINGKAT KEHILANGAN

        $jam_operasi_kondisi = round(($kinerja->waktu_distribusi / 30), 2);

        if ($jam_operasi_kondisi < 12) {
            $jam_operasi_nilai = 1;
        } elseif ($jam_operasi_kondisi < 16) {
            $jam_operasi_nilai = 2;
        } elseif ($jam_operasi_kondisi < 18) {
            $jam_operasi_nilai = 3;
        } elseif ($jam_operasi_kondisi < 21) {
            $jam_operasi_nilai = 4;
        } else {
            $jam_operasi_nilai = 5;
        }

        $jam_operasi_bobot = 0.08 * $jam_operasi_nilai;

        // END JAM OPERASI

        $tekanan_air_kondisi = ($kinerja->jumlah_pelanggan !== 0) ? round(($kinerja->pelanggan_tekanan_7 / $kinerja->jumlah_pelanggan) * 100, 2) : 0;

        if ($tekanan_air_kondisi < 20) {
            $tekanan_air_nilai = 1;
        } elseif ($tekanan_air_kondisi < 40) {
            $tekanan_air_nilai = 2;
        } elseif ($tekanan_air_kondisi < 60) {
            $tekanan_air_nilai = 3;
        } elseif ($tekanan_air_kondisi < 80) {
            $tekanan_air_nilai = 4;
        } else {
            $tekanan_air_nilai = 5;
        }

        $tekanan_air_bobot = 0.065 * $tekanan_air_nilai;

        // END TEKANAN AIR

        $penggantian_kondisi = ($kinerja->jumlah_pelanggan !== 0) ? round(($kinerja->jumlah_meter_air_diganti / $kinerja->jumlah_pelanggan) * 100, 2) : 0;

        if ($penggantian_kondisi < 5) {
            $penggantian_nilai = 1;
        } elseif ($penggantian_kondisi < 10) {
            $penggantian_nilai = 2;
        } elseif ($penggantian_kondisi < 15) {
            $penggantian_nilai = 3;
        } elseif ($penggantian_kondisi < 20) {
            $penggantian_nilai = 4;
        } else {
            $penggantian_nilai = 5;
        }

        $penggantian_bobot = 0.065 * $penggantian_nilai;

        // END PENGGANTIAN

        $rasio_pegawai_kondisi = ($kinerja->jumlah_pelanggan !== 0) ? round(($kinerja->jumlah_pegawai / $kinerja->jumlah_pelanggan) * 1000, 2) : 0;

        if ($rasio_pegawai_kondisi <= 6) {
            $rasio_pegawai_nilai = 5;
        } elseif ($rasio_pegawai_kondisi <= 8) {
            $rasio_pegawai_nilai = 4;
        } elseif ($rasio_pegawai_kondisi <= 10) {
            $rasio_pegawai_nilai = 3;
        } elseif ($rasio_pegawai_kondisi <= 12) {
            $rasio_pegawai_nilai = 2;
        } else {
            $rasio_pegawai_nilai = 1;
        }

        $rasio_pegawai_bobot = 0.07 * $rasio_pegawai_nilai;

        // END RASIO PEGAWAI

        $rasio_diklat_kondisi = ($kinerja->jumlah_pegawai !== 0) ? round(($kinerja->jumlah_pegawai_diklat / $kinerja->jumlah_pegawai) * 100, 2) : 0;

        if ($rasio_diklat_kondisi < 20) {
            $rasio_diklat_nilai = 1;
        } elseif ($rasio_diklat_kondisi < 40) {
            $rasio_diklat_nilai = 2;
        } elseif ($rasio_diklat_kondisi < 60) {
            $rasio_diklat_nilai = 3;
        } elseif ($rasio_diklat_kondisi < 80) {
            $rasio_diklat_nilai = 4;
        } else {
            $rasio_diklat_nilai = 5;
        }

        $rasio_diklat_bobot = 0.04 * $rasio_diklat_nilai;

        // END RASIO DIKLAT

        $biaya_diklat_kondisi = ($kinerja->jumlah_biaya_pegawai !== 0) ? round(($kinerja->biaya_diklat / $kinerja->jumlah_biaya_pegawai) * 100, 2) : 0;

        if ($biaya_diklat_kondisi < 2.5) {
            $biaya_diklat_nilai = 1;
        } elseif ($biaya_diklat_kondisi < 5) {
            $biaya_diklat_nilai = 2;
        } elseif ($biaya_diklat_kondisi < 7.5) {
            $biaya_diklat_nilai = 3;
        } elseif ($biaya_diklat_kondisi < 10) {
            $biaya_diklat_nilai = 4;
        } else {
            $biaya_diklat_nilai = 5;
        }

        $biaya_diklat_bobot = 0.04 * $biaya_diklat_nilai;

        // END RASIO BIAYA

        $bobot_keuangan = round($roe_bobot + $rasio_kas_bobot + $rasio_operasi_bobot + $efektifitas_penagihan_bobot + $solvabilitas_bobot, 2);
        $bobot_pelayanan = round($cakupan_pelayanan_bobot + $pertumbuhan_pelanggan_bobot + $penyelesaian_pengaduan_bobot + $kualitas_air_bobot + $air_domestik_bobot, 2);
        $bobot_produksi = round($efisiensi_produksi_bobot + $tingkat_kehilangan_bobot + $jam_operasi_bobot + $tekanan_air_bobot + $penggantian_bobot, 2);
        $bobot_sdm = round($rasio_pegawai_bobot + $rasio_diklat_bobot + $biaya_diklat_bobot, 2);
    }

    $result['roe_kondisi'] = $roe_kondisi;
    $result['roe_nilai'] = $roe_nilai;
    $result['roe_bobot'] = $roe_bobot;
    $result['rasio_operasi_kondisi'] = $rasio_operasi_kondisi;
    $result['rasio_operasi_nilai'] = $rasio_operasi_nilai;
    $result['rasio_operasi_bobot'] = $rasio_operasi_bobot;
    $result['rasio_kas_kondisi'] = $rasio_kas_kondisi;
    $result['rasio_kas_nilai'] = $rasio_kas_nilai;
    $result['rasio_kas_bobot'] = $rasio_kas_bobot;
    $result['efektifitas_penagihan_kondisi'] = $efektifitas_penagihan_kondisi;
    $result['efektifitas_penagihan_nilai'] = $efektifitas_penagihan_nilai;
    $result['efektifitas_penagihan_bobot'] = $efektifitas_penagihan_bobot;
    $result['solvabilitas_kondisi'] = $solvabilitas_kondisi;
    $result['solvabilitas_nilai'] = $solvabilitas_nilai;
    $result['solvabilitas_bobot'] = $solvabilitas_bobot;

    $result['cakupan_pelayanan_kondisi'] = $cakupan_pelayanan_kondisi;
    $result['cakupan_pelayanan_nilai'] = $cakupan_pelayanan_nilai;
    $result['cakupan_pelayanan_bobot'] = $cakupan_pelayanan_bobot;
    $result['pertumbuhan_pelanggan_kondisi'] = $pertumbuhan_pelanggan_kondisi;
    $result['pertumbuhan_pelanggan_nilai'] = $pertumbuhan_pelanggan_nilai;
    $result['pertumbuhan_pelanggan_bobot'] = $pertumbuhan_pelanggan_bobot;
    $result['penyelesaian_pengaduan_kondisi'] = $penyelesaian_pengaduan_kondisi;
    $result['penyelesaian_pengaduan_nilai'] = $penyelesaian_pengaduan_nilai;
    $result['penyelesaian_pengaduan_bobot'] = $penyelesaian_pengaduan_bobot;
    $result['kualitas_air_kondisi'] = $kualitas_air_kondisi;
    $result['kualitas_air_nilai'] = $kualitas_air_nilai;
    $result['kualitas_air_bobot'] = $kualitas_air_bobot;
    $result['air_domestik_kondisi'] = $air_domestik_kondisi;
    $result['air_domestik_nilai'] = $air_domestik_nilai;
    $result['air_domestik_bobot'] = $air_domestik_bobot;

    $result['efisiensi_produksi_kondisi'] = $efisiensi_produksi_kondisi;
    $result['efisiensi_produksi_nilai'] = $efisiensi_produksi_nilai;
    $result['efisiensi_produksi_bobot'] = $efisiensi_produksi_bobot;
    $result['tingkat_kehilangan_kondisi'] = $tingkat_kehilangan_kondisi;
    $result['tingkat_kehilangan_nilai'] = $tingkat_kehilangan_nilai;
    $result['tingkat_kehilangan_bobot'] = $tingkat_kehilangan_bobot;
    $result['jam_operasi_kondisi'] = $jam_operasi_kondisi;
    $result['jam_operasi_nilai'] = $jam_operasi_nilai;
    $result['jam_operasi_bobot'] = $jam_operasi_bobot;
    $result['tekanan_air_kondisi'] = $tekanan_air_kondisi;
    $result['tekanan_air_nilai'] = $tekanan_air_nilai;
    $result['tekanan_air_bobot'] = $tekanan_air_bobot;
    $result['penggantian_kondisi'] = $penggantian_kondisi;
    $result['penggantian_nilai'] = $penggantian_nilai;
    $result['penggantian_bobot'] = $penggantian_bobot;

    $result['rasio_pegawai_kondisi'] = $rasio_pegawai_kondisi;
    $result['rasio_pegawai_nilai'] = $rasio_pegawai_nilai;
    $result['rasio_pegawai_bobot'] = $rasio_pegawai_bobot;

    $result['rasio_diklat_kondisi'] = $rasio_diklat_kondisi;
    $result['rasio_diklat_nilai'] = $rasio_diklat_nilai;
    $result['rasio_diklat_bobot'] = $rasio_diklat_bobot;

    $result['biaya_diklat_kondisi'] = $biaya_diklat_kondisi;
    $result['biaya_diklat_nilai'] = $biaya_diklat_nilai;
    $result['biaya_diklat_bobot'] = $biaya_diklat_bobot;

    $result['bobot_keuangan'] = $bobot_keuangan;
    $result['bobot_pelayanan'] = $bobot_pelayanan;
    $result['bobot_produksi'] = $bobot_produksi;
    $result['bobot_sdm'] = $bobot_sdm;
    $result['total_bobot'] = $bobot_keuangan + $bobot_pelayanan + $bobot_produksi + $bobot_sdm;

    if ($result['total_bobot'] <= 2.2) {
        $kategori_penilaian = 'Sakit';
        $result['color'] = 'bg-danger';
        $result['badge'] = 'badge-danger';
    } elseif ($result['total_bobot'] < 2.2) {
        $kategori_penilaian = 'Kurang Sehat';
        $result['color'] = 'bg-warning';
        $result['badge'] = 'badge-warning';
    } else {
        $kategori_penilaian = 'Sehat';
        $result['color'] = 'bg-success';
        $result['badge'] = 'badge-success';
    }

    $result['kategori_penilaian'] = $kategori_penilaian;

    return $result;
}
