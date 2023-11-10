@extends('layouts.admin-master')
@section('page-title', 'Entri Kinerja PDAM')
@section('page-heading')
  <h1>Upload Kinerja PDAM</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('pdam-report.index')}}">Kinerja PDAM</a></div>
    <div class="breadcrumb-item">Upload</div>
  </div>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            @if ($errors->any())
                @foreach ($errors->all() as $err)
                    <div class="alert alert-danger">
                        {{$err}}
                    </div>
                @endforeach    
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            @if (session('message'))
                <div class="alert alert-primary">{{session('message')}}</div>
            @endif
            <div class="section-title mt-0">Tahun : {{$period_data['tahun']}}</div>
                <div class="section-title mt-0">Periode : {{$period_data['periode']}}</div>
            </div>
        </div>
        <form action="{{route('kinerja.store')}}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                <h4>Data Keuangan</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="laba_bersih">Laba Bersih</label>
                            <input type="text" class="form-control text-right" name="laba_bersih" id="laba_bersih" value="{{$finance_data['laba_bersih']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="utang_lancar">Utang lancar</label>
                            <input type="text" class="form-control text-right" name="utang_lancar" id="utang_lancar" value="{{$finance_data['utang_lancar']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="equity">Jumlah Equity</label>
                            <input type="text" class="form-control text-right" name="equity" id="equity" value="{{$finance_data['equity']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="penerimaan_rek_air">Jumlah Penerimaan Rek Air</label>
                            <input type="text" class="form-control text-right" name="penerimaan_rek_air" id="penerimaan_rek_air" value="{{$finance_data['penerimaan_rek_air']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="biaya_operasi">Biaya Operasi</label>
                            <input type="text" class="form-control text-right" name="biaya_operasi" id="biaya_operasi" value="{{$finance_data['biaya_operasi']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="rek_air">Jumlah Rekening Air</label>
                            <input type="text" class="form-control text-right" name="rek_air" id="rek_air" value="{{$finance_data['rek_air']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pendapatan_operasi">Pendapatan Operasi</label>
                            <input type="text" class="form-control text-right" name="pendapatan_operasi" id="pendapatan_operasi" value="{{$finance_data['pendapatan_operasi']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="aktiva">Jumlah Aktiva</label>
                            <input type="text" class="form-control text-right" name="aktiva" id="aktiva" value="{{$finance_data['aktiva']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="kas">Kas + Setara Kas</label>
                            <input type="text" class="form-control text-right" name="kas" id="kas" value="{{$finance_data['kas']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="utang">Jumlah Utang</label>
                            <input type="text" class="form-control text-right" name="utang" id="utang" value="{{$finance_data['utang']}}" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                <h4>Data Pelayanan</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="penduduk_terlayani">Jumlah Penduduk Terlayani</label>
                            <input type="text" class="form-control text-right" name="penduduk_terlayani" id="penduduk_terlayani" value="{{$service_data['penduduk_terlayani']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="penduduk_dalam_wilayah_Kerja_pdam">Jumlah Penduduk dlm Wilayah Kerja PDAM</label>
                            <input type="text" class="form-control text-right" name="penduduk_dalam_wilayah_Kerja_pdam" id="penduduk_dalam_wilayah_Kerja_pdam" value="{{$service_data['penduduk_dalam_wilayah_Kerja_pdam']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pelanggan_bulan_lalu">Jumlah Pelanggan Bulan Lalu</label>
                            <input type="text" class="form-control text-right" name="pelanggan_bulan_lalu" id="pelanggan_bulan_lalu" value="{{$service_data['pelanggan_bulan_lalu']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pelanggan_bulan_ini">Jumlah Pelanggan Bulan Ini</label>
                            <input type="text" class="form-control text-right" name="pelanggan_bulan_ini" id="pelanggan_bulan_ini" value="{{$service_data['pelanggan_bulan_ini']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="keluhan_selesai">Jumlah Keluhan Selesai</label>
                            <input type="text" class="form-control text-right" name="keluhan_selesai" id="keluhan_selesai" value="{{$service_data['keluhan_selesai']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="keluhan">Jumlah Keluhan</label>
                            <input type="text" class="form-control text-right" name="keluhan" id="keluhan" value="{{$service_data['keluhan']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="uji_kualitas_memenuhi_syarat">Jumlah Uji Kualitas yg Memenuhi Syarat</label>
                            <input type="text" class="form-control text-right" name="uji_kualitas_memenuhi_syarat" id="uji_kualitas_memenuhi_syarat" value="{{$service_data['uji_kualitas_memenuhi_syarat']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="jumlah_uji">Jumlah yang Uji</label>
                            <input type="text" class="form-control text-right" name="jumlah_uji" id="jumlah_uji" value="{{$service_data['jumlah_uji']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="air_terjual_domestik">Jumlah Air Terjual Domestik</label>
                            <input type="text" class="form-control text-right" name="air_terjual_domestik" id="air_terjual_domestik" value="{{$service_data['air_terjual_domestik']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pelanggan_domestik">Jumlah Pelanggan Domestik</label>
                            <input type="text" class="form-control text-right" name="pelanggan_domestik" id="pelanggan_domestik" value="{{$service_data['pelanggan_domestik']}}" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                <h4>Data Produksi</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="volume_produksi_rill">Volume Produksi Rill</label>
                            <input type="text" class="form-control text-right" name="volume_produksi_rill" id="volume_produksi_rill" value="{{$production_data['volume_produksi_rill']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="kapasitas_produksi_terpasang">Kapasitas Produksi Terpasang</label>
                            <input type="text" class="form-control text-right" name="kapasitas_produksi_terpasang" id="kapasitas_produksi_terpasang" value="{{$production_data['kapasitas_produksi_terpasang']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="volume_distribusi_air">Volume Distribusi Air</label>
                            <input type="text" class="form-control text-right" name="volume_distribusi_air" id="volume_distribusi_air" value="{{$production_data['volume_distribusi_air']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="air_terjual">Air yang Terjual</label>
                            <input type="text" class="form-control text-right" name="air_terjual" id="air_terjual" value="{{$production_data['air_terjual']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="waktu_distribusi">Waktu Distribusi Air ke Pelanggan dlm 1 bln</label>
                            <input type="text" class="form-control text-right" name="waktu_distribusi" id="waktu_distribusi" value="{{$production_data['waktu_distribusi']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pelanggan_tekanan_7">Jumlah Pelanggan dgn Tekanan > 0.7 bar</label>
                            <input type="text" class="form-control text-right" name="pelanggan_tekanan_7" id="pelanggan_tekanan_7" value="{{$production_data['pelanggan_tekanan_7']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="jumlah_pelanggan">Jumlah Pelanggan</label>
                            <input type="text" class="form-control text-right" name="jumlah_pelanggan" id="jumlah_pelanggan" value="{{$production_data['jumlah_pelanggan']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="jumlah_meter_air_diganti">Jumlah Meter Air di Ganti pd thn Bersangkutan</label>
                            <input type="text" class="form-control text-right" name="jumlah_meter_air_diganti" id="jumlah_meter_air_diganti" value="{{$production_data['jumlah_meter_air_diganti']}}" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                <h4>Data SDM</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="jumlah_pegawai">Jumlah Pegawai</label>
                            <input type="text" class="form-control text-right" name="jumlah_pegawai" id="jumlah_pegawai" value="{{$resource_data['jumlah_pegawai']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="jumlah_pegawai_diklat">Jumlah Pegawai Diklat</label>
                            <input type="text" class="form-control text-right" name="jumlah_pegawai_diklat" id="jumlah_pegawai_diklat" value="{{$resource_data['jumlah_pegawai_diklat']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="biaya_diklat">Biaya Diklat</label>
                            <input type="text" class="form-control text-right" name="biaya_diklat" id="biaya_diklat" value="{{$resource_data['biaya_diklat']}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="jumlah_biaya_pegawai">Jumlah Biaya Pegawai</label>
                            <input type="text" class="form-control text-right" name="jumlah_biaya_pegawai" id="jumlah_biaya_pegawai" value="{{$resource_data['jumlah_biaya_pegawai']}}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <input type="hidden" name="tahun" value="{{$period_data['tahun']}}">
                        <input type="hidden" name="periode" value="{{$period_data['periode']}}">
                        <div class="col-12 text-center">
                            <a href="{{route('kinerja.show.resource')}}" class="btn btn-icon icon-left btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-icon icon-left btn-success"><i class="fas fa-upload"></i> Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('page-js')
    
@endpush


