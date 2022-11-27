@extends('layout.main.main')

@section('container')
	<h2 class="mb-3 fs-sm-3">Tambah Data Transaksi</h2>
	<div class="col-md-8 p-0 mb-3">
		<a class="btn btn-primary w-sm-100" href="{{ route($transactions_route["index"]) }}">Kembali ke Data Tabel</a>
	</div>
	<div class="col-xl-8 mb-5 p-0">
		<form action="{{ route($transactions_route["store"]) }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="mb-3">
				<label for="fk_id_dormitory" class="form-label @error('fk_id_dormitory') is-invalid @enderror">Nama Penghuni Kos</label>
				@if ($dormitories)
					<select class="form-select" name="fk_id_dormitory" id="fk_id_dormitory" required>
						@foreach ($dormitories as $dormitory)
							@if (old("fk_id_dormitory") == $dormitory->id)
								<option value="{{ $dormitory->id }}" selected>{{ $dormitory->name }} ( Kamar {{ $dormitory->rooms[0]->room_number }} )</option>
							@else
								<option value="{{ $dormitory->id }}">{{ $dormitory->name }} ( Kamar {{ $dormitory->rooms[0]->room_number }} )</option>
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
			{{-- <div class="mb-3">
				<label for="total_month" class="form-label">Total Bulan Bayar</label>
				<input type="number" name="total_bulan_bayar" class="form-control @error('total_bulan_bayar') is-invalid @enderror" id="total_bulan_bayar" value="{{ old("total_bulan_bayar") }}" required>
				@error('total_bulan_bayar')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div> --}}
			<style>
				.w-100{
					width: 100% !important;
				}

				@media only screen and (min-width: 992px) { 
					.w-lg-50{
						width: 50% !important;
					}
				}
			</style>
			<div class="mb-3">
				<label for="month_duration" class="form-label">Durasi Bulan</label>
				<div class="input-group flex-column flex-lg-row">
					<div class="d-flex flex-row w-100 w-lg-50 mb-3 mb-lg-0">
						<span class="input-group-text">Dari</span>
						<select class="form-select @error('month_start') is-invalid @enderror" name="month_start" id="month_start" required>
							@foreach ($months as $month)
								@if (old("month_start") == $month["id"])
									<option value="{{ $month["id"] }}" selected>{{ $month["name"] }}</option>
								@else
									<option value="{{ $month["id"] }}">{{ $month["name"] }}</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="d-flex flex-row w-100 w-lg-50">
						<span class="input-group-text">Sampai</span>
						<select class="form-select @error('month_end') is-invalid @enderror" name="month_end" id="month_end" required>
							@foreach ($months as $month)
								@if (old("month_start") == $month["id"])
									<option value="{{ $month["id"] }}" selected>{{ $month["name"] }}</option>
								@else
									<option value="{{ $month["id"] }}">{{ $month["name"] }}</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>
				@error('month_start')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
				@error('month_end')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>
			<div class="mb-3">
				<label for="proof_payment" class="form-label">Bukti Transfer</label>
				<span>
					<img class="img-preview img-fluid mb-3 p-0 border-1 border-primary d-none" id="image-preview" style="border: solid">
				</span>
				<input class="form-control @error('proof_payment') is-invalid @enderror" type="file" id="proof_payment" name="proof_payment" accept="image/*">
				@error('proof_payment')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>

			<button type="submit" class="btn btn-primary">Tambah Data</button>
		</form>
	</div>
	<script>
		const inputImage = document.querySelector("#proof_payment");
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