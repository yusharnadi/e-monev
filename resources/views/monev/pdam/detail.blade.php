@extends('layouts.admin-master')
@section('page-title', 'Monitoring & Evaluasi Kinerja PDAM')
@section('page-heading')
    <h1>Monitoring & Evaluasi Kinerja PDAM</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{route('monev.pdam.index')}}">Monev PDAM</a></div>
        <div class="breadcrumb-item">Detail</div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('kinerja.show.period')}}" class="btn btn-icon icon-left btn-danger mb-2"><i class="fas fa-file-pdf"></i>Export</a>

                    @if (session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                    @endif
                    @if (session('message'))
                        <div class="alert alert-primary">{{session('message')}}</div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-sm table-hover table-bordered datatable">
                                <thead>
                                <tr>
                                    <th class="text-center">Aspek</th>
                                    <th class="text-center">Kondisi</th>
                                    <th class="text-center">Nilai</th>
                                    <th class="text-center">Bobot</th>
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
                                        <td>&nbsp a. Roe</td>
                                        <td class="text-right">{{$penilaian['roe_kondisi'] ?? 0}} %</td>
                                        <td class="text-right">{{$penilaian['roe_nilai'] ?? 0}}</td>
                                        <td class="text-right">{{$penilaian['roe_bobot'] ?? 0}}</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp b. Rasio Operasi</td>
                                        <td class="text-right">{{$penilaian['rasio_operasi_kondisi'] ?? 0}}</td>
                                        <td class="text-right">{{$penilaian['rasio_operasi_nilai'] ?? 0}}</td>
                                        <td class="text-right">{{$penilaian['rasio_operasi_bobot'] ?? 0}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><strong>2. Likuiditas</strong></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp a. Rasio Kas</td>
                                        <td class="text-right">{{$penilaian['rasio_kas_kondisi'] ?? 0}} %</td>
                                        <td class="text-right">{{$penilaian['rasio_kas_nilai'] ?? 0}}</td>
                                        <td class="text-right">{{$penilaian['rasio_kas_bobot'] ?? 0}}</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp b. Efektifitas Penagihan</td>
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
                                    <tr class="bg-secondary text-white">
                                        <td colspan="3"><strong>Bobot Kinerja - Aspek Keuangan</strong></td>
                                        <td class="text-right"><strong>{{$penilaian['bobot_keuangan'] ?? 0}}</strong></td>
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
                                    <tr class="bg-secondary text-white">
                                        <td colspan="3"><strong>Bobot Kinerja - Aspek Pelayanan</strong></td>
                                        <td class="text-right"><strong>{{$penilaian['bobot_pelayanan'] ?? 0}}</strong></td>
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
                                    <tr class="bg-secondary text-white">
                                        <td colspan="3"><strong>Bobot Kinerja - Aspek Operasi</strong></td>
                                        <td class="text-right"><strong>{{$penilaian['bobot_produksi'] ?? 0}}</strong></td>
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
                                    <tr class="bg-secondary text-white">
                                        <td colspan="3"><strong>Bobot Kinerja - Aspek SDM</strong></td>
                                        <td class="text-right"><strong>{{$penilaian['bobot_sdm'] ?? 0}}</strong></td>
                                    </tr>
                                    <tr class="bg-primary text-white">
                                        <td><strong>Jumlah Bobot</strong></td>
                                        <td class="text-center" colspan="3"><strong>{{$penilaian['total_bobot'] ?? 0}}</strong></td>
                                    </tr>
                                    <tr class="{{$penilaian['color']}} text-white">
                                        <td><strong>Kategori</strong></td>
                                        <td class="text-center" colspan="3"><strong>{{$penilaian['kategori_penilaian'] ?? 0}}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="col-6">
                            <form action="">
                                <div class="form-group">
                                    <label for="laba_bersih">Catatan Monitoring</label>
                                    <textarea class="form-control" name="" id="" cols="30" rows="10" style="height: 300px"></textarea>
                                </div>
                            </form>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Catatan Monitoring & Evaluasi</h4>
                    <div class="card-header-action">
                        <button class="btn btn-primary btn-icon btn-fire" data-toggles="modal" id="smallButton" data-action="{{route('monev.pdam.update', $kinerja->id)}}"><i class="fas fa-edit"></i> Tambah Catatan</button>
                      </div>
                </div>
                <div class="card-body">
                    @isset($kinerja->catatan_monitoring)
                        <p>{{$kinerja->catatan_monitoring}}</p>                        
                    @endisset
                    @empty($kinerja->catatan_monitoring)
                        <p>Belum ada catatan monitoring.</p>
                    @endempty
                </div>
                <div class="card-footer">
                    <a class="btn btn-secondary btn-icon" href="{{route('monev.pdam.index')}}"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('modal')
  <div class="modal fade" tabindex="-1" role="dialog" id="updateModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="" method="POST" id="formDelete">
          @csrf
          @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title">Tambah Catatan Monitoring & Evaluasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <label for="catatan_monitoring">Catatan Monitoring</label>
          <textarea class="form-control" name="catatan_monitoring" id="catatan_monitoring" style="height: 100px;">{{$kinerja->catatan_monitoring}}</textarea>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>
@endpush
@push('css-datatables')
@endpush
@push('datatables-js')
<script>
    $(document).ready( function () {
        // TRIGGER OPEN MODAl 
        $('.btn-fire').click(function(){
            $('#updateModal').modal({ backdrop: 'static', keyboard: false })
            $('#formDelete').attr('action', $(this).data('action'))
        })

        // MODAL ON CLOSE HANDLER
        $('#updateModal').on('hidden.bs.modal', function (e) {
            $('#formDelete').attr('action', '')
        })
    });
</script>
@endpush
