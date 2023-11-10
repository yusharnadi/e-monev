@extends('layouts.admin-master')
@section('page-title', 'Entri Kinerja PDAM')
@section('page-heading')
  <h1>Entri Kinerja PDAM</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('pdam-report.index')}}">Kinerja PDAM</a></div>
    <div class="breadcrumb-item">Entri</div>
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
        @include('kinerja.wizard_step')
        <form action="{{route('kinerja.store.service')}}" class="form wizard-content" method="POST">
        @csrf
            <div class="form-group row mb-2 mt-4">
              <label for="penduduk_terlayani" class="col-form-label text-md-right col-12 col-md-4 col-lg-3">Jumlah Penduduk Terlayani</label>
              <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                  <input class="form-control" type="number" name="penduduk_terlayani" id="penduduk_terlayani" value="{{session('service_data.penduduk_terlayani')}}" required/>
              </div>
              <label for="penduduk_dalam_wilayah_Kerja_pdam" class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Jumlah Penduduk dlm Wilayah Kerja PDAM</label>
              <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                  <input class="form-control" type="number" name="penduduk_dalam_wilayah_Kerja_pdam" id="penduduk_dalam_wilayah_Kerja_pdam" value="{{session('service_data.penduduk_dalam_wilayah_Kerja_pdam')}}" required/>
              </div>
            </div>
            <div class="form-group row mb-2 mt-4">
                <label for="pelanggan_bulan_lalu" class="col-form-label text-md-right col-12 col-md-4 col-lg-3">Jumlah Pelanggan Bulan Lalu</label>
                <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                    <input class="form-control" type="number" name="pelanggan_bulan_lalu" id="pelanggan_bulan_lalu" value="{{session('service_data.pelanggan_bulan_lalu')}}" required/>
                </div>
                <label for="pelanggan_bulan_ini" class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Jumlah Pelanggan Bulan Ini</label>
                <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                    <input class="form-control" type="number" name="pelanggan_bulan_ini" id="pelanggan_bulan_ini" value="{{session('service_data.pelanggan_bulan_ini')}}" required/>
                </div>
            </div>
            <div class="form-group row mb-2 mt-4">
                <label for="keluhan_selesai" class="col-form-label text-md-right col-12 col-md-4 col-lg-3">Jumlah Keluhan Selesai</label>
                <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                    <input class="form-control" type="number" name="keluhan_selesai" id="keluhan_selesai" value="{{session('service_data.keluhan_selesai')}}" required/>
                </div>
                <label for="keluhan" class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Jumlah keluhan</label>
                <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                    <input class="form-control" type="number" name="keluhan" id="keluhan" value="{{session('service_data.keluhan')}}" required/>
                </div>
            </div>
            <div class="form-group row mb-2 mt-4">
                <label for="uji_kualitas_memenuhi_syarat" class="col-form-label text-md-right col-12 col-md-4 col-lg-3">Jumlah Uji Kualitas yg Memenuhi Syarat</label>
                <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                    <input class="form-control" type="number" name="uji_kualitas_memenuhi_syarat" id="uji_kualitas_memenuhi_syarat" value="{{session('service_data.uji_kualitas_memenuhi_syarat')}}" required/>
                </div>
                <label for="jumlah_uji" class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Jumlah yang Diuji</label>
                <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                    <input class="form-control" type="number" name="jumlah_uji" id="jumlah_uji" value="{{session('service_data.jumlah_uji')}}" required/>
                </div>
            </div>
            <div class="form-group row mb-2 mt-4">
                <label for="air_terjual_domestik" class="col-form-label text-md-right col-12 col-md-4 col-lg-3">Jumlah Air Terjual Domestik</label>
                <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                    <input class="form-control" type="number" name="air_terjual_domestik" id="air_terjual_domestik" value="{{session('service_data.air_terjual_domestik')}}" required/>
                </div>
                <label for="pelanggan_domestik" class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Jumlah Pelanggan Domestik</label>
                <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                    <input class="form-control" type="number" name="pelanggan_domestik" id="pelanggan_domestik" value="{{session('service_data.pelanggan_domestik')}}" required/>
                </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <div class="form-group row mb-4">
              <div class="col-6 col-sm-6 col-md-6 text-left">
                <a href="{{route('kinerja.show.finance')}}" class="btn btn-icon icon-right btn-secondary"><i class="fas fa-arrow-left"></i> Prev</a>
              </div>
              <div class="col-6 col-sm-6 col-md-6 text-right">
                  <a href="{{route('kinerja.show.production')}}" class="btn btn-icon icon-right btn-warning">Next <i class="fas fa-arrow-right"></i></a>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@push('page-js')
    
@endpush


