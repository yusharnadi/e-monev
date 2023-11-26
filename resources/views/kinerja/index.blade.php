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
                    <a href="{{route('kinerja.show.period')}}" class="btn btn-info mb-2">Entri Kinerja</a>
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
                            <th>Periode Pelaporan</th>
                            <th style="width: 150px;">Created At</th>
                            <th style="width: 120px;">action</th>
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
                                    <span class="badge badge-warning">{{$kinerja['periode']}}</span>
                                    @endif
                                </td>
                                <td>{{$kinerja->created_at}}</td>
                                <td>
                                    <a href="{{route('kinerja.export', $kinerja['id'])}}" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-file-pdf"></i></a>
                                    <a href="{{route('kinerja.show', $kinerja['id'])}}" class="btn btn-icon btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                    <a href="{{route('kinerja.edit', $kinerja['id'])}}" class="btn btn-icon btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <a data-toggles="modal" id="smallButton" data-target="#deleteModal" data-action="{{route('kinerja.destroy', $kinerja->id)}}" class="btn btn-icon btn-sm btn-danger btn-fire" href="#"><i class="fas fa-trash"></i></a>
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
@push('modal')
  <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="" method="POST" id="formDelete">
          @csrf
          @method('DELETE')
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi Hapus Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah Anda yakin menghapus data ? </p>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Save changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>
@endpush
@push('css-datatables')
    <link rel="stylesheet" href="{{asset('assets/modules/DataTables/dt/css/dataTables.bootstrap4.min.css')}}">
@endpush
@push('datatables-js')
    <script src="{{asset('assets/modules/DataTables/dt/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/modules/DataTables/dt/js/dataTables.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready( function () {
            $('.datatable').DataTable();
            $('.btn-fire').click(function(){
            $('#deleteModal').modal({ backdrop: 'static', keyboard: false })
            $('#formDelete').attr('action', $(this).data('action'))})

            $('#deleteModal').on('hidden.bs.modal', function (e) {
                $('#formDelete').attr('action', '')
            })
        });
    </script>
@endpush
