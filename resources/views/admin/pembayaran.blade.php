@extends('layouts.dashboard')

@section('title', 'Manage Users')

@section('header')
{{-- @dd($bayar) --}}
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manage Pembayaran</h1>
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
                    <h3 class="card-title">Data Pembayaran</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{url('post-data-admin')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bank Name</label>
                                    <input type="text" value="{{$admin->bank_name}}" class="form-control" id="bank_name" name="bank_name" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bank Account Number</label>
                                    <input type="text" class="form-control" id="bank_account_number" value="{{$admin->bank_account_number}}" name="bank_account_number" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bank Account Owner</label>
                                    <input type="text" class="form-control" id="bank_account_owner" value="{{$admin->bank_account_owner}}" name="bank_account_owner" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bank Branch Name</label>
                                    <input type="text" class="form-control" id="bank_branch_name" value="{{$admin->bank_branch_name}}" name="bank_branch_name" aria-describedby="emailHelp">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="mt-5">
                        <table id="users" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Event</th>
                                    <th>Tanggal Transfer</th>
                                    <th>Waktu Transfer</th>
                                    <th>Invoice (img)</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bayar as $index => $item)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{DB::table('event')->where('id', $item->event_id)->value('event_name')}}</td>
                                    <td>{{$item->tf_date}}</td>
                                    <td>{{$item->tf_time}}</td>
                                    <td><a target="_blank" href="{{asset('storage/' . $item->bukti_tf)}}">View Invoice</a></td>
                                    <td>
                                        @if ($item->status == 'proses')
                                            <button class="btn btn-success" onclick="verifikasiPembayaran({{$item->id}})">Verifikasi</button>
                                        @endif
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<div class="modal fade" id="verifikasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p style="font-size: 16px">Apakah anda yakin memverifikasi pembayaran ini ?</p>
            </div>
            <div class="modal-footer">
                <form id="verifikasiPembayaran" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary " style=" height: 50px;">Ya, Saya yakin</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('lte/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
    function verifikasiPembayaran(id) {
        var action = "{{url('verifikasi-pembayaran-admin')}}" + "/" + id;
        
        $('#verifikasiPembayaran').attr('action', action);
        $('#verifikasiModal').modal('show')
    }
</script>
@endpush
