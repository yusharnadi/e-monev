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
        <form action="{{route('kinerja.store.finance')}}" class="form wizard-content" method="POST">
        @csrf
            <div class="form-group row mb-2 mt-4">
              <label for="laba_bersih" class="col-form-label text-md-right col-12 col-md-4 col-lg-3">Laba Bersih Setelah Pajak</label>
              <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                  <input class="form-control" type="number" name="laba_bersih" id="laba_bersih" value="{{session('finance_data.laba_bersih')}}" required/>
              </div>
              <label for="utang_lancar" class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Utang Lancar</label>
              <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                  <input class="form-control" type="number" name="utang_lancar" id="utang_lancar" value="{{session('finance_data.utang_lancar')}}" required/>
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="equity" class="col-form-label text-md-right col-12 col-md-4 col-lg-3">Jumlah Equity</label>
              <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                  <input class="form-control" type="number" name="equity" id="equity" value="{{session('finance_data.equity')}}" required/>
              </div>
              <label for="penerimaan_rek_air" class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Jumlah Penerimaan Rek Air</label>
              <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                  <input class="form-control" type="number" name="penerimaan_rek_air" id="penerimaan_rek_air" value="{{session('finance_data.penerimaan_rek_air')}}" required/>
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="biaya_operasi" class="col-form-label text-md-right col-12 col-md-4 col-lg-3">Biaya Operasi</label>
              <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                  <input class="form-control" type="number" name="biaya_operasi" id="biaya_operasi" value="{{session('finance_data.biaya_operasi')}}" required/>
              </div>
              <label for="rek_air" class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Jumlah Rekening Air</label>
              <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                  <input class="form-control" type="number" name="rek_air" id="rek_air" value="{{session('finance_data.rek_air')}}" required/>
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="pendapatan_operasi" class="col-form-label text-md-right col-12 col-md-4 col-lg-3">Pendapatan Operasi</label>
              <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                  <input class="form-control" type="number" name="pendapatan_operasi" id="pendapatan_operasi" value="{{session('finance_data.pendapatan_operasi')}}" required/>
              </div>
              <label for="aktiva" class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Jumlah Aktiva</label>
              <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                  <input class="form-control" type="number" name="aktiva" id="aktiva" value="{{session('finance_data.aktiva')}}" required/>
              </div>
            </div>
            <div class="form-group row mb-2">
              <label for="kas" class="col-form-label text-md-right col-12 col-md-4 col-lg-3">Kas + Setara Kas</label>
              <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                  <input class="form-control" type="number" name="kas" id="kas" value="{{session('finance_data.kas')}}" required/>
              </div>
              <label for="utang" class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Jumlah Utang</label>
              <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                  <input class="form-control" type="number" name="utang" id="utang" value="{{session('finance_data.utang')}}" required/>
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
                <a href="{{route('kinerja.show.period')}}" class="btn btn-icon icon-right btn-secondary"><i class="fas fa-arrow-left"></i> Prev</a>
              </div>
              <div class="col-6 col-sm-6 col-md-6 text-right">
                  <a href="{{route('kinerja.show.service')}}" class="btn btn-icon icon-right btn-warning">Next <i class="fas fa-arrow-right"></i></a>
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


