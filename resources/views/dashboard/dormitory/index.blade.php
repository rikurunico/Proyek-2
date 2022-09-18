@extends('layout.main.main')

@section('container')
    <div class="d-flex flex-wrap mb-5 align-items-center justify-content-between">
        {{-- <form action="{{ route(config("data.route.admin.chairs.search")) }}" method="post" class="d-inline-block navbar-search" style="width: 60%">
            @csrf
            @method("post")
            <div class="input-group">
                <input id="inputkey" type="text" name="key" value="{{ request("key") }}" autofocus="" autocomplete="off" class="form-control bg-light border-1 border-primary small" placeholder="Search by Chair Name" />
                <input id="inputtabel" type="hidden" value="{{ "test" }}" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <em class="fas fa-search fa-sm"></em>
                    </button>
                </div>
            </div>
        </form> --}}
        <a class="btn btn-primary w-sm-100 mb-sm-1" href="{{ route($dormitory_route["create"]) }}">Tambah Data Penghuni</a>
        @if ($dormitories->count() > 0)
            {{-- <form action="{{ route(config("data.route.admin.genres.print")) }}" class="d-inline" method="post">
                @csrf
                @method("post")
                <button class="btn btn-success border-0">Generete Report</button>
            </form> --}}
            <a class="btn btn-success w-sm-100" href="{{ "#" }}">Cetak Data</a>
        @endif
    </div>
    @if (session()->has("success")) 
        <div class="col-md-5 p-0">  
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session("success") }}
                <button type="button" class="btn-close py-0 py-3" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if ($dormitories->count() > 0)
        <div class="table-responsive mb-5">
            <table class="table table-striped table-sm" >
                <caption></caption>
                <style>
                    table.table thead tr th:nth-child(1)    , 
                    table.table tbody tr td:nth-child(1){
                        text-align: center
                    }

                    table.table tbody tr td{
                        vertical-align: middle !important;
                    }
                </style>
                <thead>
                    <tr>
                        <th scope="col">Nomer</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Nomer Telepon</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dormitories as $dormitory)                
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dormitory->name }}</td>
                            <td>{{ $dormitory->address }}</td>
                            <td>{{ $dormitory->phone_number }}</td>
                            <td class="d-flex">
                                <a href="{{ route($dormitory_route["show"], $dormitory->id) }}" class="btn btn-primary mr-2">Detail</a>
                                <a href="{{ route($dormitory_route["edit"], $dormitory->id) }}" class="btn btn-warning mr-2">Edit</a>
                                <form action="{{ route($dormitory_route["delete"], $dormitory->id) }}" class="d-inline" method="post">
                                    @csrf
                                    @method("delete")
                                    <button onclick="return confirm('Konfirmasi')" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $dormitories->links() }}
        </div>
    @else
        <div class="d-flex">
            <h3>Tidak ada Data Penghuni</h3>
        </div> 
    @endif

@endsection