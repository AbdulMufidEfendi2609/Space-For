<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
	<title>Daftar | Space-For.me</title>
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
		<form action="{{route('postregister')}}" method="post">
			@csrf
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
			<h2 class="center">Daftar</h2>
			<hr>
			<div class="form-group">
				<div>
					<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
					
					@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
			<div class="form-group">
				<div>
					<select id="gender" class="form-control" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>
						<option selected>Gender</option>
						<option value="Perempuan">Perempuan</option>
						<option value="Laki-laki">Laki-laki</option>
					</select>
					@error('gender')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
			<div class="form-group">
				<div>
					<input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" placeholder="No.Handphone" name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp" autofocus>
					
					@error('no_hp')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
			<div class="form-group">
				<div>
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"  name="email" value="{{ old('email') }}" required autocomplete="email">
					
					@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
			<div class="form-group">
				<div>
					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password"  name="password" required autocomplete="new-password">
					
					@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
			<div class="form-group">
				<div>
					<input id="confirm" type="password" class="form-control" placeholder="Konfirmasi Password"  name="confirm" required autocomplete="new-password">
				</div>
			</div>
			<div class="form-group">
				<div>
					<select id="jenis" class="form-control" name="jenis" value="{{ old('jenis') }}" autocomplete="jenis" autofocus>
						<option value="">Saya ingin...</option>
						<option value="user" {{old('jenis') === 'user' ? 'selected' : ''}}>Mengikuti Event</option>
						<option value="penyedia" {{old('jenis') === 'penyedia' ? 'selected' : ''}}>Menyelenggarakan Event</option>
					</select>
					@error('jenis')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-lg">Daftar</button>
			</div>
		</form>
		
	</div>
</body>
</html>
