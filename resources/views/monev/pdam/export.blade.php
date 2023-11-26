<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monitoring & Evaluasi Kinerja PDAM</title>
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
    <h3>REKAPIPUTASLI MONITOING & EVALUASI KINERJA</h3>
    <h4>PERUMDA AIR MINUM KOTA SINGKAWANG</h4>
    <h3>Tahun {{$kinerja->tahun}}</h3>
    @if ($kinerja->periode != "Tahunan")
        <h3>Periode : {{$kinerja->periode}}</h3>    
    @endif
    <table>
		<thead>
			<tr>
				<th>ASPEK</th>
				<th>KONDISI</th>
				<th>NILAI</th>
				<th>BOBOT</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td colspan="4"><strong>A. KEUANGAN</strong></td>
			</tr>
            <tr>
                <td colspan="4"><strong>1. Rentabilitas</strong></td>
            </tr>
            <tr>
                <td>&#160; a. Roe</td>
                <td class="text-right">{{$penilaian['roe_kondisi'] ?? 0}} %</td>
                <td class="text-right">{{$penilaian['roe_nilai'] ?? 0}}</td>
                <td class="text-right">{{$penilaian['roe_bobot'] ?? 0}}</td>
            </tr>
            <tr>
                <td>&#160; b. Rasio Operasi</td>
                <td class="text-right">{{$penilaian['rasio_operasi_kondisi'] ?? 0}}</td>
                <td class="text-right">{{$penilaian['rasio_operasi_nilai'] ?? 0}}</td>
                <td class="text-right">{{$penilaian['rasio_operasi_bobot'] ?? 0}}</td>
            </tr>
            <tr>
                <td colspan="4"><strong>2. Likuiditas</strong></td>
            </tr>
            <tr>
                <td>&#160; a. Rasio Kas</td>
                <td class="text-right">{{$penilaian['rasio_kas_kondisi'] ?? 0}} %</td>
                <td class="text-right">{{$penilaian['rasio_kas_nilai'] ?? 0}}</td>
                <td class="text-right">{{$penilaian['rasio_kas_bobot'] ?? 0}}</td>
            </tr>
            <tr>
                <td>&#160; b. Efektifitas Penagihan</td>
                <td class="text-right">{{$penilaian['efektifitas_penagihan_kondisi'] ?? 0}} %</td>
                <td class="text-right">{{$penilaian['efektifitas_penagihan_nilai'] ?? 0}}</td>
                <td class="text-right">{{$penilaian['efektifitas_penagihan_bobot'] ?? 0}}</td>
            </tr>
            <tr>
                <td><strong>3. Solvabilitas</strong></td>
                <td class="text-right">{{$penilaian['solvabilitas_kondisi'] ?? 0}} %</td>
                <td class="text-right">{{$penilaian['solvabilitas_nilai'] ?? 0}}</td>
                <td class="text-right">{{$penilaian['solvabilitas_bobot'] ?? 0}}</td>
            </tr>
            <tr>
                <td class="bg-secondary" colspan="3"><strong>Bobot Kinerja - Aspek Keuangan</strong></td>
                <td class="bg-secondary text-right"><strong>{{$penilaian['bobot_keuangan'] ?? 0}}</strong></td>
            </tr>
            {{-- END KEUANGAN  --}}
            <tr>
                <td colspan="4"><strong>B. Pelayanan</strong></td>
            </tr>
            <tr>
                <td>1. Cakupan Pelayanan</td>
                <td class="text-right">{{$penilaian['cakupan_pelayanan_kondisi'] ?? 0}} %</td>
                <td class="text-right">{{$penilaian['cakupan_pelayanan_nilai'] ?? 0}}</td>
                <td class="text-right">{{$penilaian['cakupan_pelayanan_bobot'] ?? 0}}</td>
            </tr>
            <tr>
                <td>2. Pertumbuhan Pelanggan</td>
                <td class="text-right">{{$penilaian['pertumbuhan_pelanggan_kondisi'] ?? 0}} %</td>
                <td class="text-right">{{$penilaian['pertumbuhan_pelanggan_nilai'] ?? 0}}</td>
                <td class="text-right">{{$penilaian['pertumbuhan_pelanggan_bobot'] ?? 0}}</td>
            </tr>
            <tr>
                <td>3. Tingkat Penyelesaian Pengaduan</td>
                <td class="text-right">{{$penilaian['penyelesaian_pengaduan_kondisi'] ?? 0}} %</td>
                <td class="text-right">{{$penilaian['penyelesaian_pengaduan_nilai'] ?? 0}}</td>
                <td class="text-right">{{$penilaian['penyelesaian_pengaduan_bobot'] ?? 0}}</td>
            </tr>
            <tr>
                <td>4. Kualitas Air Pelanggan</td>
                <td class="text-right">{{$penilaian['kualitas_air_kondisi'] ?? 0}} %</td>
                <td class="text-right">{{$penilaian['kualitas_air_nilai'] ?? 0}}</td>
                <td class="text-right">{{$penilaian['kualitas_air_bobot'] ?? 0}}</td>
            </tr>
            <tr>
                <td>5. Konsumsi Air Domestik</td>
                <td class="text-right">{{$penilaian['air_domestik_kondisi'] ?? 0}}</td>
                <td class="text-right">{{$penilaian['air_domestik_nilai'] ?? 0}}</td>
                <td class="text-right">{{$penilaian['air_domestik_bobot'] ?? 0}}</td>
            </tr>
            <tr>
                <td class="bg-secondary" colspan="3"><strong>Bobot Kinerja - Aspek Pelayanan</strong></td>
                <td class="bg-secondary text-right"><strong>{{$penilaian['bobot_pelayanan'] ?? 0}}</strong></td>
            </tr>
            {{-- END Pelayanan  --}}
            <tr>
                <td colspan="4"><strong>C. Operasi</strong></td>
            </tr>
            <tr>
                <td>1. Efisiensi Produksi</td>
                <td class="text-right">{{$penilaian['efisiensi_produksi_kondisi'] ?? 0}} %</td>
                <td class="text-right">{{$penilaian['efisiensi_produksi_nilai'] ?? 0}}</td>
                <td class="text-right">{{$penilaian['efisiensi_produksi_bobot'] ?? 0}}</td>
            </tr>
            <tr>
                <td>2. Tingkat Kehilangan Air</td>
                <td class="text-right">{{$penilaian['tingkat_kehilangan_kondisi'] ?? 0}} %</td>
                <td class="text-right">{{$penilaian['tingkat_kehilangan_nilai'] ?? 0}}</td>
                <td class="text-right">{{$penilaian['tingkat_kehilangan_bobot'] ?? 0}}</td>
            </tr>
            <tr>
                <td>3. Jam Operasi Layanan / hari</td>
                <td class="text-right">{{$penilaian['jam_operasi_kondisi'] ?? 0}} %</td>
                <td class="text-right">{{$penilaian['jam_operasi_nilai'] ?? 0}}</td>
                <td class="text-right">{{$penilaian['jam_operasi_bobot'] ?? 0}}</td>
            </tr>
            <tr>
                <td>4. Tekanan Sambungan Pelanggan</td>
                <td class="text-right">{{$penilaian['tekanan_air_kondisi'] ?? 0}} %</td>
                <td class="text-right">{{$penilaian['tekanan_air_nilai'] ?? 0}}</td>
                <td class="text-right">{{$penilaian['tekanan_air_bobot'] ?? 0}}</td>
            </tr>
            <tr>
                <td>5. Penggantian Meter Air</td>
                <td class="text-right">{{$penilaian['penggantian_kondisi'] ?? 0}} %</td>
                <td class="text-right">{{$penilaian['penggantian_nilai'] ?? 0}}</td>
                <td class="text-right">{{$penilaian['penggantian_bobot'] ?? 0}}</td>
            </tr>
            <tr>
                <td class="bg-secondary" colspan="3"><strong>Bobot Kinerja - Aspek Operasi</strong></td>
                <td class="bg-secondary text-right"><strong>{{$penilaian['bobot_produksi'] ?? 0}}</strong></td>
            </tr>
            {{-- END Operasi  --}}
            <tr>
                <td colspan="4"><strong>D. SDM</strong></td>
            </tr>
            <tr>
                <td>1. Rasio Jumlah Pegawai / 1000 Pelanggan</td>
                <td class="text-right">{{$penilaian['rasio_pegawai_kondisi'] ?? 0}}</td>
                <td class="text-right">{{$penilaian['rasio_pegawai_nilai'] ?? 0}}</td>
                <td class="text-right">{{$penilaian['rasio_pegawai_bobot'] ?? 0}}</td>
            </tr>
            <tr>
                <td>2. Rasio Diklat Pegawai / Peningkatan Kompetensi</td>
                <td class="text-right">{{$penilaian['rasio_diklat_kondisi'] ?? 0}} %</td>
                <td class="text-right">{{$penilaian['rasio_diklat_nilai'] ?? 0}}</td>
                <td class="text-right">{{$penilaian['rasio_diklat_bobot'] ?? 0}}</td>
            </tr>
            <tr>
                <td>3. Biaya Diklat terhadap Biaya Pegawai</td>
                <td class="text-right">{{$penilaian['biaya_diklat_kondisi'] ?? 0}} %</td>
                <td class="text-right">{{$penilaian['biaya_diklat_nilai'] ?? 0}}</td>
                <td class="text-right">{{$penilaian['biaya_diklat_bobot'] ?? 0}}</td>
            </tr>
            <tr>
                <td class="bg-secondary" colspan="3"><strong>Bobot Kinerja - Aspek SDM</strong></td>
                <td class="bg-secondary text-right"><strong>{{$penilaian['bobot_sdm'] ?? 0}}</strong></td>
            </tr>
            <tr>
                <td class="bg-primary"><strong>Jumlah Bobot</strong></td>
                <td class="bg-primary text-center" colspan="3"><strong>{{$penilaian['total_bobot'] ?? 0}}</strong></td>
            </tr>
            <tr>
                <td class="{{$penilaian['color']}}"><strong>Kategori</strong></td>
                <td class="{{$penilaian['color']}} text-center" colspan="3"><strong>{{$penilaian['kategori_penilaian'] ?? 0}}</strong></td>
            </tr>
		</tbody>
	</table>
</body>
</html>