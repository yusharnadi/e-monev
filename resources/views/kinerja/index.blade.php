@extends('layouts.admin-master')
@section('page-title', 'Kinerja PDAM')
@section('page-heading')
    <h1>Kinerja PDAM</h1>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('kinerja.create')}}" class="btn btn-info mb-2">Tambah Data</a>
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
                            <th style="width: 150px;">Created At</th>
                            <th style="width: 90px;">action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($kinerjas as $kinerja)
                            <tr>
                                <td>{{$kinerja['tahun']}}</td>
                                <td>
                                    @if ($kinerja['periode'] == "Tahunan")
                                        <span class="badge badge-primary">{{$kinerja['periode']}}</span>
                                    @else
                                    <span class="badge badge-secondary">{{$kinerja['periode']}}</span>
                                    @endif
                                </td>
                                <td>{{now()}}</td>
                                <td>
                                    <a href="{{route('kinerja.edit', $kinerja['id'])}}" class="btn btn-icon btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                    <a href="{{route('kinerja.edit', $kinerja['id'])}}" class="btn btn-icon btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('kinerja.edit', $kinerja['id'])}}" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
