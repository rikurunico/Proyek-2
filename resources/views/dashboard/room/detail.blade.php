@extends('layout.main.main')

@section('container')
    <h2 class="mb-3 fs-sm-3">Detail Kamar {{ $room->title }}</h2>
    <div class="col-lg-8 p-0 mb-3 mb-sm-4">
        <a class="btn btn-primary me-3 w-sm-100 mb-sm-1" href="{{ route($rooms_route["index"]) }}">Kembali ke Data Tabel</a>
        <a class="btn btn-warning me-3 w-sm-100 mb-sm-1" href="{{ route($rooms_route["edit"], $room->id) }}">Edit Data</a>
        <form action="{{ route($rooms_route["delete"], $room->id) }}" class="d-inline" method="post">
            @csrf
            @method("delete")
            <button onclick="return confirm('Konfirmasi')" class="btn btn-danger w-sm-100 mb-sm-1">Hapus</button>
        </form>
    </div>
    <div class="col-lg-8 mb-5 p-0">
        <div class="p-0 mb-sm-3">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://picsum.photos/id/200/1920/1080" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://picsum.photos/id/201/1920/1080" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://picsum.photos/1920/1080" class="d-block w-100" alt="...">
                    </div>
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
        </div>
        <div class="d-flex p-0 flex-sm-column">
            <div class="row my-3 p-0">
                <div class="col-md-5">
                    <span class="form-control border-1 border-primary">Nomer Kamar</span>
                </div>
                <div class="col-md-7">
                    <span class="form-control border-1 border-primary">{{ $room->room_number }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection