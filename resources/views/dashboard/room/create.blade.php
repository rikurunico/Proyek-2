@extends('layout.main.main')

@section('container')
	<h2 class="mb-3 fs-sm-3">Tambah Data Kamar</h2>
	<div class="col-md-8 p-0 mb-3">
		<a class="btn btn-primary w-sm-100" href="{{ route($rooms_route["index"]) }}">Kembali ke Data Tabel</a>
	</div>
	<div class="col-md-8 mb-5 p-0">
		<form action="{{ route($rooms_route["store"]) }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="mb-3">
				<label for="name" class="form-label">Nama Kamar</label>
				<select name="name" class="form-select @error('name') is-invalid @enderror" id="name" required autofocus>
					<option value="">Pilih Penghuni Kamar</option>
					@foreach ($dormitories as $dormitory)
						<option value="{{ $dormitory->name }}">{{ $dormitory->name }}</option>
					@endforeach
				</select>
				@error('name')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>
			<div class="mb-3">
				<label for="room_number" class="form-label">Nomer Kamar</label>
				<input type="number" name="room_number" class="form-control @error('room_number') is-invalid @enderror" id="room_number" value="{{ old("room_number") }}" required>
				@error('room_number')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>
			{{-- <div class="mb-3">
				<label for="preview_image" class="form-label">Gambar Kamar</label>
				<input type="text" name="preview_image" class="form-control @error('preview_image') is-invalid @enderror" id="preview_image" value="{{ old("preview_image") }}" required>
				@error('preview_image')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div> --}}
			<button type="submit" class="btn btn-primary">Tambah Data</button>
		</form>
	</div>
@endsection