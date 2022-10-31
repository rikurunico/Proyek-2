@extends('layout.main.main')

@section('container')
	<h2 class="mb-3 fs-sm-3">Tambah Data Penghuni</h2>
	<div class="col-md-8 p-0 mb-3">
		<a class="btn btn-primary w-sm-100" href="{{ route($dormitory_route["index"]) }}">Kembali ke Data Tabel</a>
	</div>
	<div class="col-md-8 mb-5 p-0">
		<form action="{{ route($dormitory_route["store"]) }}" method="post">
			@csrf
			<div class="mb-3">
				<label for="name" class="form-label">Nama</label>
				<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old("name") }}" required autofocus>
				@error('name')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>
			<div class="mb-3">
				<label for="address" class="form-label">Address</label>
				<input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" value="{{ old("address") }}" required>
				@error('address')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>
			<div class="mb-3">
				<label for="phone_number" class="form-label">Nomer Telepon</label>
				<input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" value="{{ old("phone_number") }}" required>
				@error('phone_number')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>
			<button type="submit" class="btn btn-primary">Tambah Data</button>
		</form>
	</div>
@endsection