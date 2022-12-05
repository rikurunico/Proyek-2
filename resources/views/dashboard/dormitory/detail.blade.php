@extends('layout.main.main')

@section('container')
    <h2 class="mb-3 fs-sm-3">Detail Penghuni {{ $dormitory->title }}</h2>
    <div class="col-xl-8 p-0 mb-3 mb-md-4">
        <a class="btn btn-primary me-0 me-lg-3 w-100 w-lg-auto mb-3 mb-lg-0" href="{{ route($dormitory_route["index"]) }}">Kembali ke Data Tabel</a>
        <a class="btn btn-warning me-0 me-lg-3 w-100 w-lg-auto mb-3 mb-lg-0" href="{{ route($dormitory_route["edit"], $dormitory->id) }}">Edit Data</a>
        <form action="{{ route($dormitory_route["delete"], $dormitory->id) }}" class="d-inline w-100 w-lg-auto mb-3 mb-lg-0" method="post">
            @csrf
            @method("delete")
            <button onclick="return confirm('Konfirmasi hapus data ?')" class="btn btn-danger w-100 w-lg-auto">Hapus</button>
        </form>
    </div>
    <div class="col-xl-8 mb-5 p-0">
        @if ($dormitory->image)
            <div class="mb-3 p-0 col-lg-8 ratio ratio-16x9">
                <img class="mx-sm-auto-custom" src="{{ asset("storage/" . $dormitory->image) }}" alt="Gambar" height="350px" style="display: block; aspect-ratio: 16/9; object-fit:cover; border:solid;"/>
            </div>
        @else        
            <div class="col-12 mb-3 p-0">
                <span class="form-control border-1 border-danger text-danger">Tidak ada gambar profile</span>
            </div>
        @endif

        <div class="d-flex p-0 flex-sm-column">
            <div class="row mb-3 p-0">
                <div class="col-md-5">
                    <span class="form-control border-1 border-primary">Nama</span>
                </div>
                <div class="col-md-7">
                    <span class="form-control border-1 border-primary">{{ $dormitory->name }}</span>
                </div>
            </div>
            <div class="row mb-3 p-0">
                <div class="col-md-5">
                    <span class="form-control border-1 border-primary">Telepon</span>
                </div>
                <div class="col-md-7">
                    <span class="form-control border-1 border-primary">{{ $dormitory->phone_number }}</span>
                </div>
            </div>
            <div class="row mb-3 p-0">
                <div class="col-md-5">
                    <span class="form-control border-1 border-primary">Tanggal Masuk Kos</span>
                </div>
                <div class="col-md-7">
                    <span class="form-control border-1 border-primary">{{ $dormitory->checkin_date ?? "-" }}</span>
                </div>
            </div>
            <div class="row mb-3 p-0">
                <div class="col-md-5">
                    <span class="form-control border-1 border-primary">Tanggal Keluar Kos</span>
                </div>
                <div class="col-md-7">
                    <span class="form-control border-1 border-primary">{{ $dormitory->checkout_date ?? "-" }}</span>
                </div>
            </div>
            <div class="row mb-3 p-0 flex-sm-column">
                <div class="col">
                    <span class="form-control border-1 border-primary">Alamat</span>
                </div>
                <div class="col">
                    <span class="form-control border-1 border-primary text-justify overflow-auto" style="height: 150px !important"> {{ $dormitory->address }}</span>
                </div>
            </div>
            <div class="row mb-3 p-0 flex-sm-column">
                <div class="col">
                    <span class="form-control border-1 border-primary">Skema Pembayaran</span>
                </div>
                <div class="col" id="container-response">
                    @if ($dormitory->checkin_date)
                        <style>
                            a.m-0.text-nowrap.font-weight-bold.text-primary:hover{
                                color: blue !important;
                                text-decoration: underline;
                            }
                            a.m-0.text-nowrap.font-weight-bold.text-primary.active{
                                color: red !important;
                                text-decoration: underline;
                            }
                            .border-black-solid{
                                border: 1px solid black;
                            }
                            .month-box.text-nowrap:hover{
                                text-decoration: underline;
                            }
                        </style>
                        <div class="card shadow border-1 border-primary p-0 w-100">
                            <div class="card-header">
                                <div class="d-flex py-2 w-100 overflow-auto">
                                    @for ($i = $year_checkin; $i <= $max_year + 1; $i++)
                                        <a role="button" class="text-center m-0 text-nowrap font-weight-bold text-primary {{ $i == $max_year + 1 ? "" : "mr-5" }}">{{ $i }}</a>
                                    @endfor
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="d-flex flex-column flex-md-row w-100 overflow-auto py-0 px-0 py-md-2" id="month-body">
                                    asdasd
                                </div>
                            </div>
                        </div>
                        <script>
                            console.log("ok")
                            const headerYear = document.querySelectorAll("a.m-0.text-nowrap.font-weight-bold.text-primary");
                            const containerMonth = document.getElementById("month-body");
                        
                            let year_now = new Date().getFullYear();
                            let urlajax = "{{ route("dormitory.index") }}";
                            let dormitory_id = {{ $dormitory->id }}
                        
                            headerYear.forEach(element => {
                                if (element.text == year_now) {
                                    element.classList.add("active");
                                }
                            });
                        
                            headerYear.forEach(element => {
                                element.addEventListener("click", () => {
                                    let yearActive = document.querySelector("a.m-0.text-nowrap.font-weight-bold.text-primary.active")
                                    yearActive.classList.remove("active");
                                    element.classList.toggle("active");
                                    const xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function () {
                                        if (xhr.readyState == 4 && xhr.status == 200) {
                                            containerMonth.innerHTML = xhr.responseText;
                                        }
                                    };
                                    
                                    xhr.open("GET", urlajax + "/payment/" + dormitory_id + "/year/" + element.text , true);
                                    
                                    xhr.send();
                                })
                            });
                        </script>
                    
                        {{-- <script>
                            const containerresponse = document.getElementById("container-response");
                            let urlajax = "{{ route("dormitory.index") }}";
                            let dormitory_id = {{ $dormitory->id }}

                            const xhr = new XMLHttpRequest();
                            xhr.onreadystatechange = function () {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    containerresponse.innerHTML = xhr.responseText;
                                }
                            };
                            
                            xhr.open("GET", urlajax + "/payment/" + dormitory_id, true);
                            
                            xhr.send();
                        </script> --}}
                    @else
                        <span class="form-control border-1 border-danger text-danger text-wrap">Data Tanggal Masuk Kos belum diset</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection