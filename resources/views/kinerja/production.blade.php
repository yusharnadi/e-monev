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
        <form action="{{route('kinerja.store.production')}}" class="form wizard-content" method="POST">
        @csrf
            <div class="form-group row mb-2 mt-4">
              <label for="volume_produksi_rill" class="col-form-label text-md-right col-12 col-md-4 col-lg-3">Volume Produksi Rill</label>
              <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                  <input class="form-control" type="number" name="volume_produksi_rill" id="volume_produksi_rill" value="{{session('production_data.volume_produksi_rill')}}" required/>
              </div>
              <label for="kapasitas_produksi_terpasang" class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Kapasitas Produksi Terpasang</label>
              <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                  <input class="form-control" type="number" name="kapasitas_produksi_terpasang" id="kapasitas_produksi_terpasang" value="{{session('production_data.kapasitas_produksi_terpasang')}}" required/>
              </div>
            </div>
            <div class="form-group row mb-2 mt-4">
                <label for="volume_distribusi_air" class="col-form-label text-md-right col-12 col-md-4 col-lg-3">Volume Distribusi Air</label>
                <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                    <input class="form-control" type="number" name="volume_distribusi_air" id="volume_distribusi_air" value="{{session('production_data.volume_distribusi_air')}}" required/>
                </div>
                <label for="air_terjual" class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Air yang Terjual</label>
                <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                    <input class="form-control" type="number" name="air_terjual" id="air_terjual" value="{{session('production_data.air_terjual')}}" required/>
                </div>
            </div>
            <div class="form-group row mb-2 mt-4">
                <label for="waktu_distribusi" class="col-form-label text-md-right col-12 col-md-4 col-lg-3">Waktu Distribusi Air ke Pelanggan dlm 1 bln</label>
                <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                    <input class="form-control" type="number" name="waktu_distribusi" id="waktu_distribusi" value="{{session('production_data.waktu_distribusi')}}" required/>
                </div>
                <label for="pelanggan_tekanan_7" class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Jumlah Pelanggan dgn Tekanan > 0.7 bar</label>
                <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                    <input class="form-control" type="number" name="pelanggan_tekanan_7" id="pelanggan_tekanan_7" value="{{session('production_data.pelanggan_tekanan_7')}}" required/>
                </div>
            </div>
            <div class="form-group row mb-2 mt-4">
                <label for="jumlah_pelanggan" class="col-form-label text-md-right col-12 col-md-4 col-lg-3">Jumlah Pelanggan</label>
                <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                    <input class="form-control" type="number" name="jumlah_pelanggan" id="jumlah_pelanggan" value="{{session('production_data.jumlah_pelanggan')}}" required/>
                </div>
                <label for="jumlah_meter_air_diganti" class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Jumlah Meter Air di Ganti pd thn Bersangkutan</label>
                <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                    <input class="form-control" type="number" name="jumlah_meter_air_diganti" id="jumlah_meter_air_diganti" value="{{session('production_data.jumlah_meter_air_diganti')}}" required/>
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
                <a href="{{route('kinerja.show.service')}}" class="btn btn-icon icon-right btn-secondary"><i class="fas fa-arrow-left"></i> Prev</a>
              </div>
              <div class="col-6 col-sm-6 col-md-6 text-right">
                  <a href="{{route('kinerja.show.resource')}}" class="btn btn-icon icon-right btn-warning">Next <i class="fas fa-arrow-right"></i></a>
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


