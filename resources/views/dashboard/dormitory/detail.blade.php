@extends('layout.main.main')

@section('container')
    <h2 class="mb-3 fs-sm-3">Detail Penghuni {{ $dormitory->title }}</h2>
    <div class="col-lg-8 p-0 mb-3 mb-sm-4">
        <a class="btn btn-primary me-3 w-sm-100 mb-sm-1" href="{{ route($dormitory_route["index"]) }}">Kembali ke Data Tabel</a>
        <a class="btn btn-warning me-3 w-sm-100 mb-sm-1" href="{{ route($dormitory_route["edit"], $dormitory->id) }}">Edit Data</a>
        <form action="{{ route($dormitory_route["delete"], $dormitory->id) }}" class="d-inline" method="post">
            @csrf
            @method("delete")
            <button onclick="return confirm('Konfirmasi')" class="btn btn-danger w-sm-100 mb-sm-1">Hapus</button>
        </form>
    </div>
    <div class="col-lg-8 mb-5 p-0">
        <div class="p-0 mb-sm-3">
            <img class="mx-sm-auto-custom" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Image_created_with_a_mobile_phone.png/1200px-Image_created_with_a_mobile_phone.png" alt="Gambar" height="350px" style="display: block; aspect-ratio: 2/3; object-fit:cover; border:solid;"/>
        </div>
        <div class="d-flex p-0 flex-sm-column">
            <div class="row my-3 p-0">
                <div class="col-md-5">
                    <span class="form-control border-1 border-primary">Nama</span>
                </div>
                <div class="col-md-7">
                    <span class="form-control border-1 border-primary">{{ $dormitory->name }}</span>
                </div>
            </div>
            <div class="row my-3 p-0">
                <div class="col-md-5">
                    <span class="form-control border-1 border-primary">Telepon</span>
                </div>
                <div class="col-md-7">
                    <span class="form-control border-1 border-primary">{{ $dormitory->phone_number }}</span>
                </div>
            </div>
            <div class="row my-3 p-0 flex-sm-column">
                <div class="col mb-3 m-sm-0">
                    <span class="form-control border-1 border-primary">Address</span>
                </div>
                <div class="col">
                    <span class="form-control border-1 border-primary text-justify overflow-auto" style="height: 150px"> {{ $dormitory->address }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection