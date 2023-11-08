@extends('layouts.admin-master')
@section('page-title', 'Upload Laporan Bulanan PDAM')
@section('page-heading')
  <h1>Upload Laporan Bulanan PDAM</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="https://sinarpju.digitaldev.id/laporan">Laporan Bulanan</a></div>
    <div class="breadcrumb-item">Tambah Dokumen</div>
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
        <form action="{{route('pdam-report.store')}}" class="form" method="POST"  enctype="multipart/form-data">
          @csrf
          <div class="form-group row mb-2">
            <label for="year" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tahun Pelaporan</label>
            <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
                <input class="form-control" name="year" id="year" type="number" min="1900" max="3000" step="1" value="{{date('Y') - 1 }}" required/>
            </div>
          </div>
          <div class="form-group row mb-2">
            <label for="month" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bulan</label>
            <div class="col col-sm-4 col-md-4 col-lg-2 col-xl-2">
              <select name="month" id="month" class="form-control" required>
                <option value="">Pilih Bulan</option>
                @foreach ($bulan as $item)
                    <option value="{{$item}}">{{$item}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row mb-2"> 
            <label for="filename" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Dokumen Laporan (*pdf)</label>
            <div class="custom-file col col-sm-4 col-md-4 col-lg-2 col-xl-2 ml-3">
                <input type="file" class="custom-file-input" id="filename" name="filename"/>
                <label class="custom-file-label" for="customFile">Pilih Dokumen</label>
              </div>
          </div>
          <div class="form-group row mb-2">
            <label for="note" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Catatan / Keterangan</label>
            <div class="col-sm-12 col-md-8 col-lg-6 col-xl-4">
                <textarea name="note" id="note" class="form-control" style="height: 100px;">{{old('note')}}</textarea>
            </div>
          </div>
          
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            <div class="col-sm-12 col-md-7">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection


