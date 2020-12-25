@extends('layouts.landing')

@section('title', "Landing")

@section('content')
<center>
<section id="hero" class="section hero">
    <div class="container">
        <div>
            <div class="col-md-12 col-lg-10 center">
                <div class="hero-headline mt-10" style="color:#F96145" >Edit Profil</div>
             
            </div>
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
</section>
</center>
<!-- #slider end -->
<!-- Feature #1
============================================= -->
<section id="feature1" class="section feature feature-center bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="hero-form">
                    <h6>Profil Anda</h6>
                    @if ($m = session()->get('success'))
                        <div class="alert alert-success">
                            <h3>Success!</h3>
                            <p>{{$m}}</p>
                        </div>
                    @endif
                    <form method="post" action="{{route('updateprofile')}}" novalidate="novalidate">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" value="{{old('name', $user->name)}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <select name="gender" id="gender" value="{{old('gender', $user->gender)}}" class="form-control custom-select">
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

                       

                        <div>
                            <input type="submit" class="btn btn--primary btn--block mt-10" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
</section>

@endsection
