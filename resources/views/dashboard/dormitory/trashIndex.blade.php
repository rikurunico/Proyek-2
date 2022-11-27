@extends('layout.main.main')

@section('container')
    @if (session()->has("success")) 
        <div class="col-md-5 p-0">  
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {!! session("success") !!}
                <button type="button" class="btn-close py-0 py-3" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if ($dormitories->count() > 0)
        <div class="table-responsive mb-5">
            <table class="table table-striped table-sm" >
                <caption></caption>
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
                                <a href="{{ route($dormitory_route["trashDetail"], $dormitory->id) }}" class="btn btn-primary mr-2">Detail</a>
                                <a href="{{ route($dormitory_route["trashRestore"], $dormitory->id) }}" class="btn btn-warning mr-2" onclick="return confirm('Restore data {{ $dormitory->name }}, Konfirmasi ?')" >Restore</a>
                                <form action="{{ route($dormitory_route["trashDelete"], $dormitory->id) }}" class="d-inline" method="post">
                                    @csrf
                                    @method("delete")
                                    <button onclick="return confirm('Data akan dihapus secara permanent, Konfirmasi ?')" class="btn btn-danger">Hapus Permanent</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            {{ $dormitories->links() }}
        </div>
    @else
        <div class="d-flex">
            <h3>Tidak ada data sampah pada tabel Penghuni</h3>
        </div> 
    @endif

@endsection