<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
	<title>Tambah Event | Space-for.me</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<style>
		body {
			color: #fff;
			background: #3598dc;
			font-family: 'Roboto', sans-serif;
		}
		.form-control {
			height: 41px;
			background: #f2f2f2;
			box-shadow: none !important;
			border: none;
		}
		.form-control:focus {
			background: #e2e2e2;
		}
		.form-control, .btn {
			border-radius: 3px;
		}
		.signup-form {
			width: 400px;
			margin: 30px auto;
		}
		.signup-form form {
			color: #999;
			border-radius: 3px;
			margin-bottom: 15px;
			background: #fff;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			padding: 30px;
		}
		.signup-form h2  {
			color: #333;
			font-weight: bold;
			margin-top: 0;
		}
		.signup-form hr  {
			margin: 0 -30px 20px;
		}
		.signup-form .form-group {
			margin-bottom: 20px;
		}
		.signup-form input[type="checkbox"] {
			margin-top: 3px;
		}
		.signup-form .row div:first-child {
			padding-right: 10px;
		}
		.signup-form .row div:last-child {
			padding-left: 10px;
		}
		.signup-form .btn {
			font-size: 16px;
			font-weight: bold;
			background: #3598dc;
			border: none;
			min-width: 140px;
		}
		.signup-form .btn:hover, .signup-form .btn:focus {
			background: #2389cd !important;
			outline: none;
		}
		.signup-form a {
			color: #fff;
			text-decoration: underline;
		}
		.signup-form a:hover {
			text-decoration: none;
		}
		.signup-form form a {
			color: #3598dc;
			text-decoration: none;
		}
		.signup-form form a:hover {
			text-decoration: underline;
		}
		.signup-form .hint-text  {
			padding-bottom: 15px;
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="signup-form">
		{{-- @if ($errors->any())
		<div class="alert alert-danger">
			<h3>Error!</h3>
			<ul class="list-unstyled">
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif --}}
		<form action="{{route('storeevent')}}"  enctype="multipart/form-data" method="post">
			@csrf
			<h2 class="center">Tambah Event</h2>
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
					<textarea name="deskripsi" rows="8" cols="80" class="form-control @eror('deskripsi')" placeholder="Deskripsi event..." required autocomplete="deskripsi" autofocus>{{ old('deskripsi')}}</textarea>
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
					<input id="image" type="file" class="form-control @error('image') is-invalid @enderror" placeholder="Browse"  name="image_file" required autocomplete="image">
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
					<input id="email_contact" type="email" class="form-control @error('email_contact') is-invalid @enderror" placeholder="Email" name="email_contact" value="{{ old('email_contact') }}" required autocomplete="email_contact" autofocus>
					@error('email_contact')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-lg">Submit</button>
			</div>
		</form>

	</div>

	<script>
		function packageSelect(params) {
			if (params.value == "Professional") {
				$('#input-tambahan').html('<div class="form-group"><div><input id="price" type="text" class="form-control" placeholder="Harga Event" name="price" required autocomplete="price" autofocus></div></div>')
			}else{
				$('#input-tambahan').html('')
			}
		}
	</script>
</body>
</html>
