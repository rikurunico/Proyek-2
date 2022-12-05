@extends('layout.main.main')

@section('container')
	<h2 class="mb-3">Edit Data Kamar {{ $room->room_number }}</h2>
	<div class="col-lg-8 p-0 mb-3">
		<a class="btn btn-primary w-100 w-lg-auto" href="{{ route($rooms_route["index"]) }}">Kembali ke Data Tabel</a>
	</div>
	<div class="col-lg-8 mb-5 p-0">
        <form action="{{ route($rooms_route["update"], $room->id) }}" method="post" enctype="multipart/form-data">
			@csrf
            @method("put")
			<div class="mb-3">
				<label for="fk_id_dormitory" class="form-label">Nama Penghuni Kamar</label>
				<select name="fk_id_dormitory" class="form-select @error('fk_id_dormitory') is-invalid @enderror" id="fk_id_dormitory" required autofocus>
					@if (!$room->fk_id_dormitory)			
						<option value="0" selected>Tidak Ada Penghuni</option>
					@endif
					@foreach ($dormitories as $dormitory)
						@if (old("fk_id_dormitory", $room->fk_id_dormitory) == $dormitory->id)
							<option value="{{ $dormitory->id }}" selected>{{ $dormitory->name }}</option>
						@else
							<option value="{{ $dormitory->id }}">{{ $dormitory->name }}</option>
						@endif
					@endforeach
				</select>
				@error('fk_id_dormitory')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="mb-3">
				@if ($room->roomimages->count() > 0)
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col" class="text-center">Gambar</th>
								<th scope="col" class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($room->roomimages as $roomimage)
								<tr>
									<td>
										<img src="{{ asset("storage/" . $roomimage->image) }}" alt="" class="img-thumbnail">
									</td>
									<td class="middle">
										<a href="{{ route("image.rooms.destroy", $roomimage->id) }}" class="badge badge-danger px-2 py-1 px-md-3 py-md-2" onclick="return confirm('Apakah anda yakin ingin menghapus Gambar ini?')">Hapus</a>
									</td></div>
								</tr>
							@endforeach
						</tbody>
					</table>
				@else
					<div class="col-12 p-0 mt-4">
						<span class="form-control border-1 border-danger text-danger">Tidak ada gambar untuk kamar ini</span>
					</div>
				@endif
			</div>
			
			<div class="mb-3">
				<label for="image" class="form-label">Gambar</label>
				<input type="hidden" name="fk_id_room" value="{{ $room->id }}">
				<input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
				@error('image')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
				
			</div>
			<div class="mb-3">
				<label for="room_number" class="form-label">Nomer Kamar</label>
				<input type="number" name="room_number" class="form-control @error('room_number') is-invalid @enderror" id="room_number" value="{{ old("room_number", $room->room_number) }}" required>
				@error('room_number')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>
			<button type="submit" class="btn btn-warning">Edit Data</button>
		</form>
    </div>
@endsection