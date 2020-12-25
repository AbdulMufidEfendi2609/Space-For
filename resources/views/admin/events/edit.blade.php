@extends('layouts.dashboard')

@section('title', 'Edit Event')

@section('header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Edit Event</h1>
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
                <h3 class="card-title">Edit Event: {{$event->name}}</h3>

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
                    <form action="{{route('events.update', $event->id)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')
                        <h2 class="center">Edit Event</h2>
                        <hr>
                        <div class="form-group">
                            <div>
                                <input id="event_name" type="text" class="form-control @error('event_name') is-invalid @enderror" placeholder="Event Name" name="event_name" value="{{ old('event_name', $event->event_name) }}" required autocomplete="event_name" autofocus>
                                @error('event_name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="user_id">Penyedia</label>
                                <select id="user_id" class="form-control" name="user_id" value="{{ old('user_id', $event->user_id) }}" required autocomplete="user_id" autofocus>
                                    <option disabled>Pilih penyedia</option>
                                    @foreach ($users as $user)
                                    <option value="{{$user->id}}" {{old('user_id', $event->user_id) === $user->id ? 'selected' : ''}}>{{$user->name}}</option>
                                    @endforeach
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
                                <textarea name="deskripsi" rows="8" cols="80" class="form-control @eror('deskripsi')" placeholder="Event Description..." required autocomplete="deskripsi" autofocus>{{ old('deskripsi', $event->deskripsi)}}</textarea>
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
                                <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" placeholder="Date" name="start_date" value="{{ old('start_date', $event->start_date) }}" required autocomplete="start_date" autofocus>
                                @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <input id="start_time" type="time" class="form-control @error('start_time') is-invalid @enderror" placeholder="Time" name="start_time" value="{{ old('start_time', $event->start_time) }}" required autocomplete="start_time" autofocus>
                                @error('start_time')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="">Selesai</label>
                                <input id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" placeholder="Date" name="end_date" value="{{ old('end_date', $event->end_date) }}" required autocomplete="end_date" autofocus>
                                @error('end_date')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <input id="end_time" type="time" class="form-control @error('end_time') is-invalid @enderror" placeholder="Time" name="end_time" value="{{ old('end_time', $event->end_time) }}" required autocomplete="end_time" autofocus>
                                @error('end_time')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <input id="lokasi" type="text" class="form-control @error('lokasi') is-invalid @enderror" placeholder="lokasi"  name="lokasi" value="{{ old('lokasi', $event->lokasi) }}" required autocomplete="lokasi" autofocus>
                                @error('lokasi')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            @if ($event->image)
                                <img class="rounded mx-auto d-block" src="{{$event->image_url}}">
                            @endif
                            <div>
                                <label for="image">Insert Event Poster (img)</label>
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" placeholder="Browse" value="{{old('image_file', $event->image)}}" name="image_file" autocomplete="image">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <select id="kategori" class="form-control" name="kategori" value="{{ old('kategori', $event->kategori) }}" required autocomplete="kategori" autofocus>
                                    <option disabled>Category</option>
                                    <option value="Kewirausahaan" {{old('kategori', $event->kategori) === 'Kewirausahaan' ? 'selected' : ''}}>Kewirausahaan</option>
                                    <option value="Pendidikan" {{old('kategori', $event->kategori) === 'Pendidikan' ? 'selected' : ''}}>Pendidikan</option>
                                    <option value="Ekonomi" {{old('kategori', $event->kategori) === 'Ekonomi' ? 'selected' : ''}}>Ekonomi</option>
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
                                <select id="event_privacy" class="form-control" name="event_privacy" value="{{ old('event_privacy', $event->event_privacy) }}" required autocomplete="event_privacy" autofocus>
                                    <option disabled>Event Privacy</option>
                                    <option value="Umum" {{old('event_privacy', $event->event_privacy) === 'Umum' ? 'selected' : ''}}>Umum</option>
                                    <option value="Private" {{old('event_privacy', $event->event_privacy) === 'Private' ? 'selected' : ''}}>Private</option>
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
                                <select id="package" class="form-control" name="package" value="{{ old('package') }}" required autocomplete="package" autofocus>
                                    <option selected>Package</option>
                                    <option value="Free" {{old('package', $event->package) === 'Free' ? 'selected' : ''}}>Free</option>
                                    <option value="Profesional" {{old('package', $event->package) === 'Profesional' ? 'selected' : ''}}>Profesional</option>
                                </select>
                                @error('package')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <input id="limit_participant" type="text" class="form-control @error('limit_participant') is-invalid @enderror" placeholder="limit_participant" name="limit_participant" value="{{ old('limit_participant', $event->limit_participant) }}" required autocomplete="limit_participant" autofocus>
                                @error('limit_participant')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <select id="status" class="form-control" name="status" value="{{ old('status') }}" required autocomplete="status" autofocus>
                                    <option selected>Status</option>
                                    <option value="pending" {{old('status', $event->status) === 'pending' ? 'selected' : ''}}>Pending</option>
                                    <option value="publish" {{old('status', $event->status) === 'publish' ? 'selected' : ''}}>Publish</option>
                                     <option value="end" {{old('status', $event->status) === 'end' ? 'selected' : ''}}>Berakkir</option>
                                </select>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" placeholder="Link Room" name="link" value="{{ old('link', $event->link) }}" required autocomplete="link" autofocus>
                                @error('link')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <input id="shorten_link" type="text" class="form-control @error('shorten_link') is-invalid @enderror" placeholder="Shorten Link" name="shorten_link" value="{{ old('shorten_link', $event->shorten_link) }}" required autocomplete="shorten_link" autofocus>
                                @error('shorten_link')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <input id="email_contact" type="email" class="form-control @error('email_contact') is-invalid @enderror" placeholder="Email Contact Person" name="email_contact" value="{{ old('email_contact', $event->email_contact) }}" required autocomplete="email_contact" autofocus>
                                @error('email_contact')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg">Save</button>

                            <button type="button" class="btn btn-danger btn-delete btn-sm float-right">Delete <i class="fa fa-trash"></i></button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</section>

<form method="POST" action="{{route('events.destroy', $event->id)}}" id="formDelete" class="d-none">
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
