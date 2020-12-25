@extends('layouts.dashboard')

@section('title', 'Buat User')

@section('header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Buat user</h1>
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
                <h3 class="card-title">Buat user baru</h3>

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
                    <form action="{{route('users.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-control custom-select">
                                <option selected="" disabled="">Select one</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Laki-laki">Laki-laki</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No. HP</label>
                            <input type="text" id="no_hp" name="no_hp" value="{{old('no_hp')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{old('email')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" value="{{old('password')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis User</label>
                            <select name="jenis" id="jenis" class="form-control custom-select">
                                <option selected="" disabled="">Select one</option>
                                <option value="peserta">Mengikuti Event</option>
                                <option value="penyedia">Menyelenggarakan Event</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="organisasi">Organisasi</label>
                            <input type="text" id="organisasi" name="organisasi" value="{{old('organisasi')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="posisi">Posisi</label>
                            <input type="text" id="posisi" name="posisi" value="{{old('posisi')}}" class="form-control">
                            <span class="form-text text-muted">Posisi pada organisasi</span>
                        </div>

                        <div class="form-group">
                            <label for="level_user">Level User</label>
                            <select name="level" id="level_user" class="form-control custom-select">
                                <option selected="" disabled="">Select one</option>
                                <option value="user">User</option>
                                <option value="penyedia">Penyedia</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <input type="submit" value="Buat User" class="btn btn-success float-right">
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</section>
@endsection
