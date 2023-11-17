@extends('layouts.admin-master')
@section('page-title', 'Users')
@section('page-heading')
  <h1>Users</h1>
@endsection
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body table-responsive">
          <a href="{{route('users.create')}}" class="btn btn-info mb-2">Tambah Data</a>
          @if (session('error'))
            <div class="alert alert-danger">{{session('error')}}</div> 
          @endif
          @if (session('message'))
            <div class="alert alert-primary">{{session('message')}}</div> 
          @endif
          <table class="table table-hover datatable">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th style="width: 50px">action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)  
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        <a href="{{route('users.edit', $user->id)}}" class="btn btn-icon btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a data-toggles="modal" id="smallButton" data-target="#deleteModal" data-action="{{route('users.destroy', $user->id)}}" class="btn btn-icon btn-sm btn-danger btn-fire" href="#"><i class="fas fa-trash"></i></a>
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
        $('#formDelete').attr('action', $(this).data('action'))
      })

      $('#deleteModal').on('hidden.bs.modal', function (e) {
        $('#formDelete').attr('action', '')
        console.log(e);
      })
    });
  </script>
@endpush
