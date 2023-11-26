<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rekapitulasi Data Kinerja PDAM</title>
    <style>
        * {
            font-size: 14px;
        }
		table {
			width:100%;
			border:1px solid #b3adad;
			border-collapse:collapse;
			padding:5px;
            margin-block: 30px;
            margin-inline: auto;
		}
		table th {
			border:1px solid #b3adad;
			padding:5px;
			background: #2e69a8;
			color: #ffffff;
		}
		table td {
			border:1px solid #b3adad;
			/* text-align:center; */
			padding:5px;
			background: #ffffff;
			color: #313030;
		}
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .bg-secondary {
            background: #545454;
            color: #ffffff;
        }
        .bg-primary {
            background: #2e69a8;
            color: #ffffff;
        }
        .bg-success {
            background: #47c363;
            color: #ffffff;
        }
        .bg-warning {
            background: #ffc107;
            color: #ffffff;
        }
        .bg-danger {
            background: #dc3545;
            color: #ffffff;
        }
        h3, h4 {
            text-align: center;
            line-height: 0.2;
        }
	</style>
</head>
<body>
    <h3>REKAPITULASI DATA KINERJA PDAM</h3>
    <h4>PERUMDA AIR MINUM KOTA SINGKAWANG</h4>
    <h3>Tahun {{$kinerja->tahun}}</h3>
    @if ($kinerja->periode != "Tahunan")
        <h3>Periode : {{$kinerja->periode}}</h3>    
    @endif
    <table>
		<thead>
			<tr>
				<th>ASPEK</th>
				<th>NILAI</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td colspan="2"><strong>A. DATA KEUANGAN</strong></td>
			</tr>
            <tr>
                <td>1. Laba Bersih Setelah Pajak</td>
                <td class="text-right">{{rupiah($kinerja->laba_bersih)}}</td>
            </tr>
            <tr>
                <td>2. Jumlah Equity</td>
                <td class="text-right">{{rupiah($kinerja->equity)}}</td>
            </tr>
            <tr>
                <td>3. Biaya Operasi</td>
                <td class="text-right">{{rupiah($kinerja->biaya_operasi)}}</td>
            </tr>
            <tr>
                <td>4. Pendapatan Operasi</td>
                <td class="text-right">{{rupiah($kinerja->pendapatan_operasi)}}</td>
            </tr>
            <tr>
                <td>5. Kas + Setara Kas</td>
                <td class="text-right">{{rupiah($kinerja->kas)}}</td>
            </tr>
            <tr>
                <td>6. Utang Lancar</td>
                <td class="text-right">{{rupiah($kinerja->utang_lancar)}}</td>
            </tr>
            <tr>
                <td>7. Jumlah Penerimaan Rek Air</td>
                <td class="text-right">{{rupiah($kinerja->penerimaan_rek_air)}}</td>
            </tr>
            <tr>
                <td>8. Jumlah Rek Air</td>
                <td class="text-right">{{rupiah($kinerja->rek_air)}}</td>
            </tr>
            <tr>
                <td>9. Jumlah Aktiva</td>
                <td class="text-right">{{rupiah($kinerja->aktiva)}}</td>
            </tr>
            <tr>
                <td>10. Jumlah Utang</td>
                <td class="text-right">{{rupiah($kinerja->utang)}}</td>
            </tr>
            {{-- END KEUANGAN  --}}
            <tr>
				<td colspan="2"><strong>B. DATA PELAYANAN</strong></td>
			</tr>
            <tr>
                <td>1. Jumlah Penduduk yang Terlayani</td>
                <td class="text-right">{{format_angka($kinerja->penduduk_terlayani)}}</td>
            </tr>
            <tr>
                <td>2. Jumlah Penduduk dalam Wilayah Kerja PDAM</td>
                <td class="text-right">{{format_angka($kinerja->penduduk_dalam_wilayah_Kerja_pdam)}}</td>
            </tr>
            <tr>
                <td>3. Jumlah Pelanggan Bulan Lalu</td>
                <td class="text-right">{{format_angka($kinerja->pelanggan_bulan_lalu)}}</td>
            </tr>
            <tr>
                <td>4. Jumlah Pelanggan Bulan Ini</td>
                <td class="text-right">{{format_angka($kinerja->pelanggan_bulan_ini)}}</td>
            </tr>
            <tr>
                <td>5. Jumlah Keluhan Selesai</td>
                <td class="text-right">{{format_angka($kinerja->keluhan_selesai)}}</td>
            </tr>
            <tr>
                <td>6. Jumlah Keluhan</td>
                <td class="text-right">{{format_angka($kinerja->keluhan)}}</td>
            </tr>
            <tr>
                <td>7. Jumlah Uji Kualitas yang Memenuhi Syarat</td>
                <td class="text-right">{{format_angka($kinerja->uji_kualitas_memenuhi_syarat)}}</td>
            </tr>
            <tr>
                <td>8. Jumlah yang Diuji</td>
                <td class="text-right">{{format_angka($kinerja->jumlah_uji)}}</td>
            </tr>
            <tr>
                <td>9. Jumlah Air yang Terjual Domestik</td>
                <td class="text-right">{{format_angka($kinerja->air_terjual_domestik)}}</td>
            </tr>
            <tr>
                <td>10. Jumlah Pelanggan Domestik</td>
                <td class="text-right">{{format_angka($kinerja->pelanggan_domestik)}}</td>
            </tr>
            {{-- END Pelayanan  --}}
            <tr>
				<td colspan="2"><strong>C. DATA PRODUKSI</strong></td>
			</tr>
            <tr>
                <td>1. Volume Produksi Rill</td>
                <td class="text-right">{{format_angka($kinerja->volume_produksi_rill)}}</td>
            </tr>
            <tr>
                <td>2. Kapasitas Produksi Terpasang</td>
                <td class="text-right">{{format_angka($kinerja->kapasitas_produksi_terpasang)}}</td>
            </tr>
            <tr>
                <td>3. Volume Distribusi Air</td>
                <td class="text-right">{{format_angka($kinerja->volume_distribusi_air)}}</td>
            </tr>
            <tr>
                <td>4. Air yang Terjual</td>
                <td class="text-right">{{format_angka($kinerja->air_terjual)}}</td>
            </tr>
            <tr>
                <td>5. Waktu Distribusi Air ke Pelanggan Dalam 1 Bulan</td>
                <td class="text-right">{{format_angka($kinerja->waktu_distribusi)}}</td>
            </tr>
            <tr>
                <td>6. Jumlah Pelanggan dengan Tekanan > 0.7 bar</td>
                <td class="text-right">{{format_angka($kinerja->pelanggan_tekanan_7)}}</td>
            </tr>
            <tr>
                <td>7. Jumlah Pelanggan</td>
                <td class="text-right">{{format_angka($kinerja->jumlah_pelanggan)}}</td>
            </tr>
            <tr>
                <td>8. Jumlah Meter Air yang Diganti Pada Tahun Bersangkutan</td>
                <td class="text-right">{{format_angka($kinerja->jumlah_meter_air_diganti)}}</td>
            </tr>
            {{-- END Produksi  --}}
            <tr>
				<td colspan="2"><strong>D. DATA SDM</strong></td>
			</tr>
            <tr>
                <td>1. Jumlah Pegawai</td>
                <td class="text-right">{{format_angka($kinerja->jumlah_pegawai)}}</td>
            </tr>
            <tr>
                <td>2. Jumlah Pelanggan</td>
                <td class="text-right">{{format_angka($kinerja->jumlah_pelanggan)}}</td>
            </tr>
            <tr>
                <td>3. Jumlah Pegawai yang Ikut Diklat</td>
                <td class="text-right">{{format_angka($kinerja->jumlah_pegawai_diklat)}}</td>
            </tr>
            <tr>
                <td>4. Biaya Diklat Pegawai</td>
                <td class="text-right">{{rupiah($kinerja->biaya_diklat)}}</td>
            </tr>
            <tr>
                <td>5. Jumlah Biaya Pegawai</td>
                <td class="text-right">{{rupiah($kinerja->jumlah_biaya_pegawai)}}</td>
            </tr>
		</tbody>
	</table>
</body>
</html>