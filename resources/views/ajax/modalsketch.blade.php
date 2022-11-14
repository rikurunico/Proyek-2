<div class="modal-header">
    <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $room ? "Data kamar nomer " . $room->room_number : "Query params " . $room_number . " gagal" }}</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    @if ($room)                
        <div class="col-lg-10 mx-auto mb-5 p-0">
            <div class="p-0 mb-sm-3">
                @if (count($room->roomimages) > 0)
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-indicators">
                            @for ($i = 0; $i < count($room->roomimages); $i++)
                                @if ($i == 0)
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}" class="active" aria-current="true" aria-label="Slide {{ $i+1 }}"></button>
                                @else
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}" aria-label="Slide {{ $i+1 }}"></button>
                                @endif
                            @endfor
                        </div>
                        <div class="carousel-inner bg-primary flex justify-content-center align-items-center w-100">
                            @for ($i = 0; $i < count($room->roomimages); $i++)
                                @if ($i == 0)
                                    <div class="carousel-item active">
                                        <img src="{{ asset("storage/" . $room->roomimages[$i]->image) }}" class="d-block w-100" alt="...">
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <img src="{{ asset("storage/" . $room->roomimages[$i]->image) }}" class="d-block w-100" alt="...">
                                    </div>
                                @endif
                            @endfor
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                @else
                    <div class="col-md-8 mb-3 p-0">
                        <span class="form-control border-1 border-danger text-danger">Tidak ada gambar untuk kamar ini</span>
                    </div>
                @endif
            </div>
            <div class="d-flex p-0 flex-column">
                <div class="row my-3 p-0">
                    <div class="col-md-5">
                        <span class="form-control border-1 border-primary">Nomer Kamar</span>
                    </div>
                    <div class="col-md-7">
                        <span class="form-control border-1 border-primary">{{ $room->room_number }}</span>
                    </div>
                </div>
                <div class="row my-3 p-0">
                    <div class="col-md-5">
                        <span class="form-control border-1 border-primary">Nama Penghuni Kos</span>
                    </div>
                    <div class="col-md-7">
                        <span class="form-control border-1 border-primary {{ $room->dormitory->name ?? "text-danger"}}">{{ $room->dormitory->name ?? "Tidak ada penghuni"}}</span>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center">
            Tidak ada data kamar nomer {{ $room_number }}
        </div>
    @endif
</div>
<div class="modal-footer">
    @if ($room)
        <button type="button" class="btn btn-primary">Lihat data lebih lengkap</button>
    @endif
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
</div>