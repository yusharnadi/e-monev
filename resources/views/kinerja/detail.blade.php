@extends('layouts.admin-master')
@section('page-title', 'Detail Kinerja PDAM')
@section('page-heading')
  <h1>Detail Kinerja PDAM</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('kinerja.index')}}">Kinerja PDAM</a></div>
    <div class="breadcrumb-item">Detail</div>
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
            <div class="section-title mt-0">Tahun : {{$kinerja->tahun}}</div>
                <div class="section-title mt-0">Periode : {{$kinerja->periode}}</div>
            </div>
        </div>
       
            @csrf
            <div class="card">
                <div class="card-header">
                <h4>Data Keuangan</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="laba_bersih">Laba Bersih</label>
                            <input type="text" class="form-control text-right" name="laba_bersih" id="laba_bersih" value="{{$kinerja->laba_bersih}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="utang_lancar">Utang lancar</label>
                            <input type="text" class="form-control text-right" name="utang_lancar" id="utang_lancar" value="{{$kinerja->utang_lancar}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="equity">Jumlah Equity</label>
                            <input type="text" class="form-control text-right" name="equity" id="equity" value="{{$kinerja->equity}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="penerimaan_rek_air">Jumlah Penerimaan Rek Air</label>
                            <input type="text" class="form-control text-right" name="penerimaan_rek_air" id="penerimaan_rek_air" value="{{$kinerja->penerimaan_rek_air}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="biaya_operasi">Biaya Operasi</label>
                            <input type="text" class="form-control text-right" name="biaya_operasi" id="biaya_operasi" value="{{$kinerja->biaya_operasi}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="rek_air">Jumlah Rekening Air</label>
                            <input type="text" class="form-control text-right" name="rek_air" id="rek_air" value="{{$kinerja->rek_air}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pendapatan_operasi">Pendapatan Operasi</label>
                            <input type="text" class="form-control text-right" name="pendapatan_operasi" id="pendapatan_operasi" value="{{$kinerja->pendapatan_operasi}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="aktiva">Jumlah Aktiva</label>
                            <input type="text" class="form-control text-right" name="aktiva" id="aktiva" value="{{$kinerja->aktiva}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="kas">Kas + Setara Kas</label>
                            <input type="text" class="form-control text-right" name="kas" id="kas" value="{{$kinerja->kas}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="utang">Jumlah Utang</label>
                            <input type="text" class="form-control text-right" name="utang" id="utang" value="{{$kinerja->utang}}" readonly>
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
                            <input type="text" class="form-control text-right" name="penduduk_terlayani" id="penduduk_terlayani" value="{{$kinerja->penduduk_terlayani}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="penduduk_dalam_wilayah_Kerja_pdam">Jumlah Penduduk dlm Wilayah Kerja PDAM</label>
                            <input type="text" class="form-control text-right" name="penduduk_dalam_wilayah_Kerja_pdam" id="penduduk_dalam_wilayah_Kerja_pdam" value="{{$kinerja->penduduk_dalam_wilayah_Kerja_pdam}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pelanggan_bulan_lalu">Jumlah Pelanggan Bulan Lalu</label>
                            <input type="text" class="form-control text-right" name="pelanggan_bulan_lalu" id="pelanggan_bulan_lalu" value="{{$kinerja->pelanggan_bulan_lalu}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pelanggan_bulan_ini">Jumlah Pelanggan Bulan Ini</label>
                            <input type="text" class="form-control text-right" name="pelanggan_bulan_ini" id="pelanggan_bulan_ini" value="{{$kinerja->pelanggan_bulan_ini}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="keluhan_selesai">Jumlah Keluhan Selesai</label>
                            <input type="text" class="form-control text-right" name="keluhan_selesai" id="keluhan_selesai" value="{{$kinerja->keluhan_selesai}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="keluhan">Jumlah Keluhan</label>
                            <input type="text" class="form-control text-right" name="keluhan" id="keluhan" value="{{$kinerja->keluhan}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="uji_kualitas_memenuhi_syarat">Jumlah Uji Kualitas yg Memenuhi Syarat</label>
                            <input type="text" class="form-control text-right" name="uji_kualitas_memenuhi_syarat" id="uji_kualitas_memenuhi_syarat" value="{{$kinerja->uji_kualitas_memenuhi_syarat}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="jumlah_uji">Jumlah yang Uji</label>
                            <input type="text" class="form-control text-right" name="jumlah_uji" id="jumlah_uji" value="{{$kinerja->jumlah_uji}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="air_terjual_domestik">Jumlah Air Terjual Domestik</label>
                            <input type="text" class="form-control text-right" name="air_terjual_domestik" id="air_terjual_domestik" value="{{$kinerja->air_terjual_domestik}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pelanggan_domestik">Jumlah Pelanggan Domestik</label>
                            <input type="text" class="form-control text-right" name="pelanggan_domestik" id="pelanggan_domestik" value="{{$kinerja->pelanggan_domestik}}" readonly>
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
                            <input type="text" class="form-control text-right" name="volume_produksi_rill" id="volume_produksi_rill" value="{{$kinerja->volume_produksi_rill}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="kapasitas_produksi_terpasang">Kapasitas Produksi Terpasang</label>
                            <input type="text" class="form-control text-right" name="kapasitas_produksi_terpasang" id="kapasitas_produksi_terpasang" value="{{$kinerja->kapasitas_produksi_terpasang}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="volume_distribusi_air">Volume Distribusi Air</label>
                            <input type="text" class="form-control text-right" name="volume_distribusi_air" id="volume_distribusi_air" value="{{$kinerja->volume_distribusi_air}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="air_terjual">Air yang Terjual</label>
                            <input type="text" class="form-control text-right" name="air_terjual" id="air_terjual" value="{{$kinerja->air_terjual}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="waktu_distribusi">Waktu Distribusi Air ke Pelanggan dlm 1 bln</label>
                            <input type="text" class="form-control text-right" name="waktu_distribusi" id="waktu_distribusi" value="{{$kinerja->waktu_distribusi}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pelanggan_tekanan_7">Jumlah Pelanggan dgn Tekanan > 0.7 bar</label>
                            <input type="text" class="form-control text-right" name="pelanggan_tekanan_7" id="pelanggan_tekanan_7" value="{{$kinerja->pelanggan_tekanan_7}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="jumlah_pelanggan">Jumlah Pelanggan</label>
                            <input type="text" class="form-control text-right" name="jumlah_pelanggan" id="jumlah_pelanggan" value="{{$kinerja->jumlah_pelanggan}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="jumlah_meter_air_diganti">Jumlah Meter Air di Ganti pd thn Bersangkutan</label>
                            <input type="text" class="form-control text-right" name="jumlah_meter_air_diganti" id="jumlah_meter_air_diganti" value="{{$kinerja->jumlah_meter_air_diganti}}" readonly>
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
                            <input type="text" class="form-control text-right" name="jumlah_pegawai" id="jumlah_pegawai" value="{{$kinerja->jumlah_pegawai}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="jumlah_pegawai_diklat">Jumlah Pegawai Diklat</label>
                            <input type="text" class="form-control text-right" name="jumlah_pegawai_diklat" id="jumlah_pegawai_diklat" value="{{$kinerja->jumlah_pegawai_diklat}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="biaya_diklat">Biaya Diklat</label>
                            <input type="text" class="form-control text-right" name="biaya_diklat" id="biaya_diklat" value="{{$kinerja->biaya_diklat}}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="jumlah_biaya_pegawai">Jumlah Biaya Pegawai</label>
                            <input type="text" class="form-control text-right" name="jumlah_biaya_pegawai" id="jumlah_biaya_pegawai" value="{{$kinerja->jumlah_biaya_pegawai}}" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 text-center">
                            <a href="{{route('kinerja.index')}}" class="btn btn-icon icon-left btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                            {{-- <button type="submit" class="btn btn-icon icon-left btn-success"><i class="fas fa-upload"></i> Upload</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
</div>
@endsection
@push('page-js')
    
@endpush


