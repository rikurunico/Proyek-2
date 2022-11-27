@extends('layout.main.main')

@section('container')
	<h2 class="mb-3 fs-sm-3">Tambah Data Kamar</h2>
	<div class="col-lg-8 p-0 mb-3">
		<a class="btn btn-primary w-100 w-lg-auto" href="{{ route($rooms_route["index"]) }}">Kembali ke Data Tabel</a>
	</div>
	<div class="col-lg-8 mb-5 p-0">
		<form action="{{ route($rooms_route["store"]) }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="mb-3">
				<label for="fk_id_dormitory" class="form-label @error('fk_id_dormitory') is-invalid @enderror">Nama Penghuni Kos</label>
				@if ($dormitories)
					<select class="form-select" name="fk_id_dormitory" id="fk_id_dormitory" required>
						@foreach ($dormitories as $dormitory)
							@if (old("fk_id_dormitory") == $dormitory->id)
								<option value="{{ $dormitory->id }}" selected>{{ $dormitory->name }}</option>
							@else
								<option value="{{ $dormitory->id }}">{{ $dormitory->name }}</option>
							@endif
						@endforeach
					</select>
				@else
					<div class="form-control is-invalid">Tidak ada penghuni kos. Tambah data penghuni kos dahulu <a href="{{ route($dormitories_routes["index"]) }}">disini</a></div>
				@endif
				@error('fk_id_dormitory')
					<div class="invalid-feedback">
						{!! $message !!}
					</div>
				@enderror
			</div>
			<div class="mb-3">
				<label for="room_number" class="form-label">Nomer Kamar</label>
				<input type="number" name="room_number" class="form-control @error('room_number') is-invalid @enderror" id="room_number" value="{{ old("room_number") }}" required>
				@error('room_number')
					<div class="invalid-feedback">
						{!! $message !!}
					</div>
				@enderror
			</div>
			<div class="mb-3">
				<label for="image" class="form-label">Image</label>
				<span>
					<img class="img-preview img-fluid mb-3 p-0 border-1 border-primary d-none" id="image-preview" style="border: solid">
				</span>
				<input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image[]" multiple accept="image/*">
				@error('image')
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
	<script>
		const inputImage = document.querySelector("#image");
		const previewImage = document.querySelector("#image-preview.img-preview");
		
		inputImage.onchange = function(){
			previewImage.classList.remove("d-none")			
			previewImage.style.display = "block";
			previewImage.style.height = "350px";
			previewImage.style.aspectRatio = "16/9";
			previewImage.style.objectFit = "cover";

			const oFReader = new FileReader();
			oFReader.readAsDataURL(inputImage.files[0]);

			oFReader.onload = function (oFREvent) {
				previewImage.src = oFREvent.target.result;
			}
		}
	</script>
@endsection