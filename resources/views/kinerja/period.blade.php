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
            <form action="{{route('kinerja.store.period')}}" class="form wizard-content" method="POST">
            @csrf
                <div class="form-group row mb-2">
                    <label for="year" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tahun</label>
                    <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                        <input class="form-control" name="tahun" id="year" type="number" min="1900" max="3000" step="1" value="{{date('Y') - 1 }}" required/>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="month" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Periode</label>
                    <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                      <select name="periode" id="month" class="form-control" required>
                        <option value="">Pilih Periode</option>
                            @foreach ($period as $p)
                                <option value="{{$p}}" @selected($p == session('period_data.periode'))>{{$p}}</option>
                            @endforeach
                      </select>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-12 text-right">
                        <a href="{{route('kinerja.show.finance')}}" class="btn btn-icon icon-right btn-warning">Next <i class="fas fa-arrow-right"></i></a>
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


