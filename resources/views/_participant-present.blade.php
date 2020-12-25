@extends('layouts.landing')

@section('title', "Landing")

@section('content')
<center>
    <section id="hero" class="section hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 center">
                    @if ($present == "absent" || $present == "sudah bayar")
                    <div class="heading heading-1 text--center mb-80">
                        <h5>Silahkan isi form untuk melakukan presence</h5>
                    </div>
                    <form class="form-inline" action="{{url('submit-presence', $id)}}" method="POST">
                        @csrf
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="nama_lengkap" class="sr-only">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap">
                            
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="no_hp" class="sr-only">No. Hp</label>
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" placeholder="No. Hp">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="form-group mx-sm-3 mb-2" style="margin-top: -20px">
                            <button type="submit" class="btn btn-primary">Submit Presence</button>
                        </div>
                    </form>
                    @else
                    <h5 class="heading heading-1 text--center mb-80">
                        <h5>Anda telah melakukan Presensi</h5>
                        <p>Salin link berikut untuk mengikuti event</p>
                        <div class="col-md-8">
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="text" class="form-control" name="link" id="link" value="{{$event->link}}">
                            </div>
                            <button class="btn btn-success" onclick="copy_text()">Copy</button>
                            @php
                            $sertifikat = DB::table('sertifikat')->where('event_id', $event->id)->first();
                            // dd($sertifikat);
                            @endphp
                            @if ($sertifikat != "null")
                            <div class="">
                                <a class="btn btn-success mt-5" href="{{url('download-sertif', $event->id)}}">Download Sertifikat</a>
                            </div>    
                            @endif
                            
                        </div>
                        
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- .container end -->
    </section>
</center>
<!-- #slider end -->
<section id="feature1" class="section feature feature-center bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-6 offset-lg-3">
                <div class="heading heading-1 text--center mb-80">
                    <h5>Daftar Peserta yang telah presence</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">No. Hp</th>
                        <th scope="col">E-mail</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($participants as $index => $item)
                    <tr>
                        <th scope="row">{{$index+1}}</th>
                        <td>{{$item->nama_lengkap}}</td>
                        <td>{{$item->no_hp}}</td>
                        <td>{{$item->email}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
</section>
<!-- #feature1 end -->


@endsection
@section('script')
<script>
    function copy_text() {
        document.getElementById("link").select();
        document.execCommand("copy");
        alert("Link berhasil dicopy");
    }
</script>
@endsection
