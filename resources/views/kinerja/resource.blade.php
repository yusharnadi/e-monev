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
        <form action="{{route('kinerja.store.resource')}}" class="form wizard-content" method="POST">
        @csrf
            <div class="form-group row mb-2 mt-4">
              <label for="jumlah_pegawai" class="col-form-label text-md-right col-12 col-md-4 col-lg-3">Jumlah Pegawai</label>
              <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                  <input class="form-control text-right" type="number" name="jumlah_pegawai" id="jumlah_pegawai" value="{{session('resource_data.jumlah_pegawai')}}" required/>
              </div>
              <label for="jumlah_pegawai_diklat" class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Jumlah Pegawai Diklat</label>
              <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                  <input class="form-control text-right" type="number" name="jumlah_pegawai_diklat" id="jumlah_pegawai_diklat" value="{{session('resource_data.jumlah_pegawai_diklat')}}" required/>
              </div>
            </div>
            <div class="form-group row mb-2 mt-4">
                <label for="biaya_diklat" class="col-form-label text-md-right col-12 col-md-4 col-lg-3">Biaya Diklat</label>
                <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                    <input class="form-control text-right" type="number" name="biaya_diklat" id="biaya_diklat" value="{{session('resource_data.biaya_diklat')}}" required/>
                </div>
                <label for="jumlah_biaya_pegawai" class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Jumlah Biaya Pegawai</label>
                <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                    <input class="form-control text-right" type="number" name="jumlah_biaya_pegawai" id="jumlah_biaya_pegawai" value="{{session('resource_data.jumlah_biaya_pegawai')}}" required/>
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
                <a href="{{route('kinerja.show.production')}}" class="btn btn-icon icon-right btn-secondary"><i class="fas fa-arrow-left"></i> Prev</a>
              </div>
              <div class="col-6 col-sm-6 col-md-6 text-right">
                  <a href="{{route('kinerja.create')}}" class="btn btn-icon icon-right btn-warning">Next <i class="fas fa-arrow-right"></i></a>
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


