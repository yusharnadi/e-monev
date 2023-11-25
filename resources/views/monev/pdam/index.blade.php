@extends('layouts.admin-master')
@section('page-title', 'Monitoring & Evaluasi Kinerja PDAM')
@section('page-heading')
    <h1>Monitoring & Evaluasi Kinerja PDAM</h1>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                    @endif
                    @if (session('message'))
                        <div class="alert alert-primary">{{session('message')}}</div>
                    @endif
                    <table class="table table-hover datatable">
                        <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Periode</th>
                            <th>Bobot</th>
                            <th>Kategori</th>
                            <th style="width: 150px;">Created At</th>
                            <th style="width: 90px;">action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($kinerjas as $kinerja)
                        @php
                            $penilaian = calculateBpspam($kinerja);
                        @endphp
                            <tr>
                                <td>{{$kinerja['tahun']}}</td>
                                <td>
                                    @if ($kinerja['periode'] == "Tahunan")
                                        <span class="badge badge-primary">{{$kinerja['periode']}}</span>
                                    @else
                                    <span class="badge badge-warning">{{$kinerja['periode']}}</span>
                                    @endif
                                </td>
                                <td><strong>{{$penilaian['total_bobot']}}</strong></td>
                                <td><span class="badge {{$penilaian['badge']}}">{{$penilaian['kategori_penilaian']}}</span></td>
                                <td>{{$kinerja->created_at}}</td>
                                <td>
                                    <a target="_blank" href="{{route('monev.pdam.export', $kinerja->id)}}" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-file-pdf"></i></a>
                                    <a href="{{route('monev.pdam.detail', $kinerja['id'])}}" class="btn btn-icon btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css-datatables')
    <link rel="stylesheet" href="{{asset('assets/modules/DataTables/dt/css/dataTables.bootstrap4.min.css')}}">
@endpush
@push('datatables-js')
    <script src="{{asset('assets/modules/DataTables/dt/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/modules/DataTables/dt/js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready( function () {
            $('.datatable').DataTable();
        });
    </script>
@endpush
