@extends('layouts.dashboard')

@section('title', 'Manage Events')

@section('header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Manage Events</h1>
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
              <h3 class="card-title">Data Events</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="{{ route('events.create') }}" class="btn btn-sm btn-info mb-2">Tambah <i class="fa fa-plus"></i></a>
              <table id="events" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Penyedia</th>
                  <th>Lokasi</th>
                  <th>Email</th>
                  <th>Kategori</th>
                  <th>Privasi</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->event_name }}</td>
                    <td>{{ $event->user->name }}</td>
                    <td>{{ $event->lokasi }}</td>
                    <td>{{ $event->email_contact }}</td>
                    <td>{{ $event->kategori }}</td>
                    <td>{{ $event->event_privacy }}</td>
                    <td>{{ $event->start_date .' '. $event->start_time }}</td>
                    <td>{{ $event->end_date .' '. $event->end_time }}</td>
                    <td>
                        <a href="{{route('events.show', $event->id)}}" class="btn btn-md btn-info"> <i class="fa fa-eye"></i></a>
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
        $('#events').DataTable();
    })
</script>
@endpush
