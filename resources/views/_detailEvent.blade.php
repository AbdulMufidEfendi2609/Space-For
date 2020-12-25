@extends('layouts.landing')

@section('title', "Landing")

@section('content')
{{-- @dd($event->participants) --}}
<center>
    <section id="hero" class="section hero">
        <div class="container">
            <div class="col-md-12 col-lg-10">
                @if (session('alert'))
                <div class="alert alert-danger">
                    {{ session('alert') }}
                </div>
                @endif
                <div class="feature-img bg-blue">
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
                <div class="feature-content mt-4">
                    
                    @php
                    $participant = DB::table('participants')->where(['user_id' => Auth::user()->id, 'event_id' => $event->id])->get();
                    // dd($participant);
                    @endphp
                    @if (auth()->user()->level== "user")
                    @if (count($participant) == null)
                    <button class="btn btn-primary" data-toggle="modal" data-target="#daftarModal">Daftar</button>
                    @else
                    <button class="btn btn-primary" disabled>Anda Sudah Daftar</button>
                    @endif
                    @endif
                    
                    @if (auth()->user()->level== "penyedia")
                    <button class="btn btn-primary" onclick="editEvent({{$event->id}})">Edit</button>
                    @endif
                </div>
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
</center>

<!-- Modal -->
<div class="modal fade" id="daftarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p style="font-size: 16px">Apakah anda yakin mengikuti event ini ?</p>
            </div>
            <div class="modal-footer">
                <form action="{{url('daftar-event', $event->id)}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary " style=" height: 50px;">Ya, Saya yakin</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-event" enctype="multipart/form-data" method="post">
                    @csrf
                    <h5 class="center">Edit Event</h5>
                    <hr>
                    <input type="hidden" name="dateNow" value="{{date('Y-m-d')}}">
                    <div class="form-group">
                        <div>
                            <input id="event_name" type="text" class="form-control @error('event_name') is-invalid @enderror" placeholder="Nama event" name="event_name" value="{{ old('event_name') }}" required autocomplete="event_name" autofocus>
                            
                            @error('event_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <textarea name="deskripsi" id="deskripsi" rows="8" cols="80" class="form-control @eror('deskripsi')" placeholder="Deskripsi event..." required autocomplete="deskripsi" autofocus>{{ old('deskripsi')}}</textarea>
                            @error('deskripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="">Mulai</label>
                            <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" placeholder="Date" name="start_date" value="{{ old('start_date') }}" required autocomplete="start_date" autofocus>
                            @error('start_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            
                            <input id="start_time" type="time" class="form-control @error('start_time') is-invalid @enderror" placeholder="Time" name="start_time" value="{{ old('start_time') }}" required autocomplete="start_time" autofocus>
                            @error('start_time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="">Berakhir</label>
                            <input id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" placeholder="Date" name="end_date" value="{{ old('end_date') }}" required autocomplete="end_date" autofocus>
                            @error('end_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <input id="end_time" type="time" class="form-control @error('end_time') is-invalid @enderror" placeholder="Time" name="end_time" value="{{ old('end_time') }}" required autocomplete="end_time" autofocus>
                            @error('end_time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <input id="lokasi" type="text" class="form-control @error('lokasi') is-invalid @enderror" placeholder="Lokasi"  name="lokasi" value="{{ old('lokasi') }}" required autocomplete="lokasi" autofocus>
                            @error('lokasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <label for="image">Poster Event (img)</label>
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" placeholder="Browse"  name="image_file" autocomplete="image">
                            @error('image_file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <select id="kategori" class="form-control" name="kategori" value="{{ old('kategori') }}" required autocomplete="kategori" autofocus>
                                <option selected>Kategori</option>
                                <option value="Kewirausahaan">Kewirausahaan</option>
                                <option value="Pendidikan">Pendidikan</option>
                                <option value="Ekonomi">Ekonomi</option>
                            </select>
                            @error('kategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <select id="event_privacy" class="form-control" name="event_privacy" value="{{ old('event_privacy') }}" required autocomplete="event_privacy" autofocus>
                                <option selected>Privasi Event</option>
                                <option value="Umum">Umum</option>
                                <option value="Mahasiswa">Mahasiswa</option>
                                <option value="SMA Sederajat">SMA Sederajat</option>
                            </select>
                            @error('event_privacy')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <select id="package" class="form-control" name="package" value="{{ old('package') }}" onchange="packageSelect(this)" required autocomplete="package" autofocus>
                                <option value="" selected>Paket</option>
                                <option value="Free">Free</option>
                                <option value="Professional">Professional(Limit Participant)</option>
                            </select>
                            @error('package')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div id="input-tambahan"></div>
                    <div class="form-group">
                        <div>
                            <input id="limit_participant" type="text" class="form-control @error('limit_participant') is-invalid @enderror" placeholder="Kuota Peserta" name="limit_participant" value="{{ old('limit_participant') }}" required autocomplete="limit_participant" autofocus>
                            @error('limit_participant')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" placeholder="Link Room" name="link" value="{{ old('link') }}" required autocomplete="link" autofocus>
                            @error('link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <input id="shorten_link" type="text" class="form-control @error('shorten_link') is-invalid @enderror" placeholder="Shorten Link" name="shorten_link" value="{{ old('shorten_link') }}" required autocomplete="shorten_link" autofocus>
                            @error('shorten_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <input id="email_contact" type="email" class="form-control @error('email_contact') is-invalid @enderror" placeholder="Email" name="email_contact" value="{{ old('email_contact') }}" required autocomplete="email_contact" autofocus>
                            @error('email_contact')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
@section('script')

<script>
    function editEvent(id) {
        $.ajax({
            type: "GET",
            url: "{{url('ajax-get-event')}}" + "/" + id,
            dataType: "json",
            success: function (data) {
                var action = "{{url('events-update')}}" + "/" + id
                console.log(data);
                $('#event_name').val(data['event_name']);
                $('#deskripsi').val(data['deskripsi']);
                $('#start_date').val(data['start_date']);
                $('#start_time').val(data['start_time']);
                $('#end_date').val(data['end_date']);
                $('#end_time').val(data['end_time']);
                $('#lokasi').val(data['lokasi']);
                $('#kategori').val(data['kategori']);
                $('#event_privacy').val(data['event_privacy']);
                $('#package').val(data['package']);
                $('#limit_participant').val(data['limit_participant']);
                $('#link').val(data['link']);
                $('#shorten_link').val(data['shorten_link']);
                $('#email_contact').val(data['email_contact']);
                $('#edit-event').attr('action', action)
               


                $('#editModal').modal('show')
            }
        })
    }
</script>
    
@endsection
