@extends('layout.main.main')

@section('container')
	<h2 class="mb-3 fs-sm-3">Tambah Data Penghuni</h2>
	<div class="col-md-8 p-0 mb-3">
		<a class="btn btn-primary w-sm-100" href="{{ route($dormitory_route["index"]) }}">Kembali ke Data Tabel</a>
	</div>
	<div class="col-md-8 mb-5 p-0">
		<form action="{{ route($dormitory_route["store"]) }}" method="post" enctype="multipart/form-data">
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
				<label for="address" class="form-label">Alamat</label>
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
			<div class="mb-3">
				<label for="checkin_date" class="form-label">Tanggal Masuk Kos</label>
				<input type="date" name="checkin_date" class="form-control @error('checkin_date') is-invalid @enderror" id="checkin_date" value="{{ old("checkin_date", date('m/d/Y')) }}" required>
				@error('checkin_date')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>
			<div class="mb-3">
				<label for="image" class="form-label">Foto KTP</label>
				<span>
					<img class="img-preview img-fluid col-lg-10 col-xl-8 mb-3 p-0 border-1 border-primary d-none" id="image-preview" style="border: solid">
				</span>
				<input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" accept="image/*">
				@error('image')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>

			<button type="submit" class="btn btn-primary">Tambah Data</button>
		</form>
	</div>
	<script>
		const inputImage = document.querySelector("#image");
		const previewImage = document.querySelector("#image-preview.img-preview");

		const displayInputImage = () => {	
			previewImage.classList.remove("d-none")			
			previewImage.style.display = "block";
			// previewImage.style.height = "350px";
			previewImage.style.aspectRatio = "16/9";
			previewImage.style.objectFit = "cover";
			const oFReader = new FileReader();
			oFReader.readAsDataURL(inputImage.files[0]);

			oFReader.onload = function (oFREvent) {
				previewImage.src = oFREvent.target.result;
			}
		}

		if (inputImage.files[0] != null) {	
			displayInputImage()
		}

		inputImage.addEventListener("change", displayInputImage) 
	</script>
@endsection