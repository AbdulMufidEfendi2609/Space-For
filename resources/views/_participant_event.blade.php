@extends('layouts.landing')

@section('title', "Landing")

@section('content')
{{-- @dd($event) --}}
<center>
    <section id="hero" class="section hero">
        <div class="container">
            <div class="col-md-12 col-lg-10">
                @php
                    $sertifikat = DB::table('sertifikat')->where('event_id', $event->id)->first();
                    // dd($sertifikat)
                @endphp
                @if ($sertifikat == null)
                <button onclick="addSertif({{$event->id}})" class="btn btn-primary">Add Certificate</button>
                @else
                <button onclick="viewSertif(this)" data-img="{{$sertifikat->sertifikat}}" class="btn btn-primary">View Certificate</button>
                @endif
                <div class="feature-img bg-blue mt-5">
                    <img src="{{asset($event->image_url)}}" alt="" width="100%">
                </div>
                <div class="hero-headline mt-10" >{{$event->event_name}}</div>
                <div class="display-4">{{date('d F Y', strtotime($event->start_date))}} - {{date('d F Y', strtotime($event->end_date))}}</div>
                <div class="display-4">{{$event->start_time}} - {{$event->end_time}}</div>
                <div class="display-4">
                    <img src="{{asset('landing/images/pin.png')}}" alt="" width="50px">
                    {{$event->lokasi}}
                </div>
                <div class="feature-content mt-4">
                    <p style="font-size: 20px">{{$event->deskripsi}}</p>
                </div>
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
</center>

<section class="section feature feature-center bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-6 offset-lg-3">
                <div class="heading heading-1 text--center mb-80">
                    <h5>Participant {{$event->event_name}}</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="text-center">Nama Lengkap</th>
                        <th scope="col" class="text-center">No. Hp</th>
                        <th scope="col" class="text-center">E-mail</th>
                        <th scope="col" class="text-center">Status</th>
                        @if ($event->package == "Professional")
                        <th scope="col" class="text-center">Invoice Proof (img)</th>
                        @endif
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($participants as $index => $item)
                    <tr>
                        @if ($item->status == "proses" || $item->status == "sudah bayar")
                        <th scope="row">{{$index+1}}</th>
                        <td class="text-center">{{Auth::user()->name}}</td>
                        <td class="text-center">{{Auth::user()->no_hp}}</td>
                        <td class="text-center">{{Auth::user()->email}}</td>
                        <td class="text-center">{{$item->status}}</td>
                        @php
                        $pembayaran =  DB::table('pembayarans')->where(['user_id' => $item->user_id, 'event_id' => $item->event_id])->first();
                        // dd($pembayaran);
                        @endphp
                        @if ($event->package == "Professional")
                        <td class="text-center"><a target="_blank" href="{{asset('storage/'. $pembayaran->bukti_tf)}}">View Invoice Proof</a></td>
                        @endif
                        <td class="text-center">
                            @if ($event->package == "Professional")
                            <button onclick="verifikasiParticipant({{$item->id}})" data-toggle="modal" data-target="#verifikasiModal" class="btn btn-primary" style="width: 110px; height: 30px; line-height: 0">Verifikasi</button>
                            @endif
                            <button onclick="deleteParticipant({{$item->id}})" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger" style="width: 110px; height: 30px; line-height: 0">Delete</button>
                        </td>
                        
                        @else
                        <th scope="row">{{$index+1}}</th>
                        <td class="text-center">{{$item->nama_lengkap}}</td>
                        <td class="text-center">{{$item->no_hp}}</td>
                        <td class="text-center">{{$item->email}}</td>
                        <td>{{$item->status}}</td>
                        @php
                        $pembayaran =  DB::table('pembayarans')->where(['user_id' => $item->user_id, 'event_id' => $item->event_id])->first();
                        // dd($pembayaran);
                        @endphp
                        @if ($event->package == "Professional")
                        <td class="text-center"><a target="_blank" href="{{asset('storage/'. $pembayaran->bukti_tf)}}">View Invoice Proof</a></td>
                        @endif
                        <td class="text-center">
                            <button onclick="deleteParticipant({{$item->id}})" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger" style="width: 110px; height: 30px; line-height: 0">Delete</button>
                        </td>
                        @endif
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
</section>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p style="font-size: 16px">Apakah anda yakin mengahpus peserta ini ?</p>
            </div>
            <div class="modal-footer">
                <form id="deleteParticipants" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary " style=" height: 50px;">Ya, Saya yakin</button>
                </form>
            </div>
        </div>
    </div>
</div>

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
                <form id="verifikasiParticipants" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary " style=" height: 50px;">Ya, Saya yakin</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="sertifModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Upload Sertifikat</h5>
                <div id="price"></div>
                <form id="form-sertif" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image">Sertifikat</label>
                        <input type="file" class="form-control" id="image" name="image" aria-describedby="emailHelp" >
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewSertifModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Sertifikat</h5>
                <div>
                    <img id="img-sertifikat" width="200" alt="">
                </div>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

<script>
    function deleteParticipant(id) {
        var action = "{{url('delete-participant')}}" + "/" + id;
        
        $("#deleteParticipants").attr('action', action);
    }
    
    function verifikasiParticipant(id) {
        var action = "{{url('verifikasi-participant')}}" + "/" + id;
        
        $("#verifikasiParticipants").attr('action', action);
    }

    function addSertif(id) {
        var action = "{{url('post-sertif')}}" + "/" + id

        $('#form-sertif').attr('action', action);
        $('#sertifModal').modal('show')
    }

    function viewSertif(elm) {
        // var img =
        var imgSertif = "{{asset('storage/')}}" + "/" + $(elm).data('img') 
        // console.log(imgSertif);
        $('#img-sertifikat').attr('src', imgSertif)
         $('#viewSertifModal').modal('show')
    }
</script>

@endsection
