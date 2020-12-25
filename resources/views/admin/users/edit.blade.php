@extends('layouts.dashboard')

@section('title', 'Edit User')

@section('header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Edit User</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('content')
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Edit user {{$user->name}}</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <h3>Error!</h3>
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('users.update', $user->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" value="{{old('name', $user->name)}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-control custom-select">
                                <option disabled="">Select one</option>
                                <option value="Perempuan" {{old('gender', $user->gender) === 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                                <option value="Laki-laki" {{old('gender', $user->gender) === 'Laki-laki' ? 'selected' : ''}}>Laki-laki</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No. HP</label>
                            <input type="text" id="no_hp" name="no_hp" value="{{old('no_hp', $user->no_hp)}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{old('email', $user->email)}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" value="{{old('password', $user->password)}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis User</label>
                            <select name="jenis" id="jenis" class="form-control custom-select">
                                <option disabled="">Select one</option>
                                <option value="peserta" {{old('jenis', $user->jenis) === 'peserta' ? 'selected' : ''}}>Mengikuti Event</option>
                                <option value="penyedia" {{old('jenis', $user->jenis) === 'penyedia' ? 'selected' : ''}}>Menyelenggarakan Event</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="organisasi">Organisasi</label>
                            <input type="text" id="organisasi" name="organisasi" value="{{old('organisasi', $user->organisasi)}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="posisi">Posisi</label>
                            <input type="text" id="posisi" name="posisi" value="{{old('posisi', $user->posisi)}}" class="form-control">
                            <span class="form-text text-muted">Posisi pada organisasi</span>
                        </div>

                        <div class="form-group">
                            <label for="level_user">Level User</label>
                            <select name="level" id="level_user" class="form-control custom-select">
                                <option disabled="">Select one</option>
                                <option value="user" {{old('level', $user->level) === 'user' ? 'selected' : ''}}>User</option>
                                <option value="penyedia" {{old('level', $user->level) === 'penyedia' ? 'selected' : ''}}>Penyedia</option>
                                <option value="admin" {{old('level', $user->level) === 'admin' ? 'selected' : ''}}>Admin</option>
                            </select>
                        </div>
                        <input type="submit" value="Simpan" class="btn btn-success">

                        <button type="button" class="btn btn-sm btn-danger btn-delete float-right">Hapus pengguna <i class="fa fa-trash"></i></button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</section>

<form method="POST" action="{{route('users.destroy', $user->id)}}" id="formDelete" class="d-none">
@csrf
@method('DELETE')
</form>
@endsection

@push('js')
<script>
    $(function () {
        $('.btn-delete').on('click', function () {
            $('#formDelete').submit();
        });
    })
</script>
@endpush
