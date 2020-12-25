@extends('layouts.dashboard')

@section('title', 'Manage Users')

@section('header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Manage Users</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Pengguna</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="{{ route('users.create') }}" class="btn btn-sm btn-info mb-2">Tambah <i class="fa fa-plus"></i></a>
              <table id="users" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Gender</th>
                  <th>No Hp</th>
                  <th>Email</th>
                  <th>Jenis</th>
                  <th>Organisasi</th>
                  <th>Posisi</th>
                  <th>Level</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->no_hp }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->jenis }}</td>
                    <td>{{ $user->organisasi }}</td>
                    <td>{{ $user->posisi }}</td>
                    <td>{{ $user->level }}</td>
                    <td>
                        <a href="{{route('users.show', $user->id)}}" class="btn btn-md btn-info"> <i class="fa fa-eye"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@endsection

@push('js')
<script src="{{ asset('lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
    $(function () { 
        $('#users').DataTable();
    })
</script>
@endpush
