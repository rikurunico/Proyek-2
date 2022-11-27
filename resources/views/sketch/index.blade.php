<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <title>Denah Kos Daarus Sa'adah</title>
    <!-- Favicons -->
    {{-- <link href={{ asset("assets/img/favicon.png") }} rel="icon">
    <link href={{ asset("assets/img/apple-touch-icon.png") }} rel="apple-touch-icon"> --}}

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Template Main CSS File -->
    <link href={{ asset("assets/css/style.css") }} rel="stylesheet">
    <link href={{ asset("style/overridebs.css") }} rel="stylesheet">
    <style>
        .carousel-indicators [data-bs-target]{
            background-color: #4e73df;
        }

        .sketch-box{
            overflow-x: auto;
        }

        .sketch{
            min-width: 768px;
        }
        
        .room{
            display: flex;
            justify-content: center;    
            align-items: center;
            height: 150px;
            color: black;
            cursor: pointer;
            box-sizing: border-box;
            transition: all 0.3s ease-in-out;
        }

        .room:hover{
            color: #0d6efd;
            font-weight: bold;
        }

        .border-sketch{
            border: 1px solid black;
            border-radius: 0.2rem;
        }

        .row-sketch{
            width: 100%;
            display: flex;
        }

        .box-sketch-center{
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 600;
        }

        .text-to-bottom{
            writing-mode: vertical-lr;
            letter-spacing: 0.2rem
        }

        .h-50{
            height: 50px !important;
        }

        .h-75{
            height: 75px !important;
        }

        .h-100{
            height: 100px !important;
        }

        .h-125{
            height: 125px !important;
        }

        .h-150{
            height: 150px !important;
        }

        .h-175{
            height: 175px !important;
        }

        .h-200{
            height: 200px !important;
        }

        .h-225{
            height: 225px !important;
        }

        .h-250{
            height: 250px !important;
        }

        .h-300{
            height: 300px !important;
        }

        .h-350{
            height: 350px !important;
        }

        .h-400{
            height: 400px !important;
        }

        .h-450{
            height: 450px !important;
        }

        .h-500{
            height: 500px !important;
        }

        .h-525{
            height: 525px !important;
        }

        .h-550{
            height: 550px !important;
        }

        .h-600{
            height: 600px !important;
        }

        .h-700{
            height: 700px !important;
        }

        .h-850{
            height: 850px !important;
        }

        .border-red{
            border: 1px solid red;
        }

        .modal-dialog{
            max-width: 1000px;
        }

        .room-full{
            /* background-color: #e80368; */
            background-color: red;
            color: white
        }

        /* @media only screen and (max-width: 768px) {
            .sketch {
                margin-right: 1rem;
            } 
        } */
    </style>
</head>

<body>
    <div class="container-lg mx-auto">
        <h2 class="mb-3 text-center">Denah Kos Daarus Sa'adah</h2>
        <div class="mb-3 text-center">
            <a class="btn btn-primary" href="{{ route("home") }}">Kembali ke Homepage</a>
            {{-- <a class="btn btn-warning" href="{{ route("home") }}">Edit</a> --}}
        </div>
        <div class="d-flex w-100 bg-primary">
            <div class="card shadow border-1 border-primary p-0 w-100">
                <!-- Card Header - Dropdown -->
                <div class="card-header">
                    <style>
                        h5.m-0.text-nowrap.font-weight-bold.text-primary:hover{
                            color: blue !important;
                            text-decoration: underline;
                        }
                        h5.m-0.text-nowrap.font-weight-bold.text-primary.active{
                            color: red !important;
                            text-decoration: underline;
                        }
                    </style>
                    <div class="d-flex py-3 w-100 overflow-auto">
                        <h5 id="l1" role="button" class="m-0 text-nowrap font-weight-bold text-primary me-5">Lantai 1</h5>
                        <h5 id="l2" role="button" class="m-0 text-nowrap font-weight-bold text-primary me-5">Lantai 2</h5>
                        <h5 id="l3" role="button" class="m-0 text-nowrap font-weight-bold text-primary me-5">Lantai 3</h5>
                        <h5 id="l4" role="button" class="m-0 text-nowrap font-weight-bold text-primary">Lantai 4</h5>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body sketch-box px-0 px-lg-4">
                    <div class="sketch px-3 px-lg-0" id="sketch-canvas">
                        {{-- Row 1 --}}
                        <div class="row-sketch">
                            <div class="col-12 d-flex">
                                <div class="col-10 h-150 box-sketch-center border-sketch">
                                    Halaman Depan (Rumah) / Parkir
                                </div>
                                <div class="col-2 h-150 box-sketch-center border-sketch">
                                    Toko
                                </div>
                            </div>
                        </div>
                        {{-- Row 2 --}}
                        <div class="row-sketch">
                            <div class="col-4">
                                <div class="col-12 d-flex">
                                    <div class="col-10">
                                        <div class="col-12 h-200 box-sketch-center border-sketch">
                                            Garasi
                                        </div>
                                        <a id="1" class="col-12 room h-100 border-sketch" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            Kamar 1
                                        </a>
                                        <a id="2" class="col-12 room h-100 border-sketch" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            Kamar 2
                                        </a>
                                        <a id="3" class="col-12 room h-100 border-sketch" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            Kamar 3
                                        </a>
                                        <a id="4" class="col-12 room h-100 border-sketch" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            Kamar 4
                                        </a>
                                    </div>
                                    <div class="col-2">
                                        <div class="col-12 h-600 box-sketch-center text-to-bottom border-sketch">
                                            Teras Depan (Kos)
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="col-12 d-flex">
                                    <div class="col-4 h-50 box-sketch-center border-sketch">
                                        Toilet
                                    </div>
                                    <div class="col-4 h-50 box-sketch-center border-sketch">
                                        Toilet
                                    </div>
                                    <div class="col-4 h-50 box-sketch-center border-sketch">
                                        Toilet
                                    </div>
                                </div>
                                <div class="col-12 h-50 box-sketch-center border-sketch">
                                    Lorong / Jalan
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="col-12 d-flex">
                                    <div class="col-2 d-flex">
                                        <div class="col-12 h-700 box-sketch-center text-to-bottom border-sketch">
                                            Lorong / Jalan / Parkir
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="col-12 h-600 box-sketch-center border-sketch">
                                            Rumah Admin Kos
                                        </div>
                                        <div class="col-12 h-100 box-sketch-center border-sketch">
                                            Teras Belakang (Rumah) / Parkir
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Row 3 --}}
                        <div class="row-sketch">
                            <div class="col-3">
                                <div class="col-12 h-75 box-sketch-center border-sketch">
                                    Tangga
                                </div>
                                <div class="col-12 h-225 box-sketch-center border-sketch">
                                    Gudang / Parkir
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="col-12 h-300 box-sketch-center border-sketch">
                                    Halaman Utama
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="col-12 h-300 box-sketch-center border-sketch">
                                    Dapur
                                </div>
                            </div>
                        </div>
                        {{-- Row 4 --}}
                        <div class="row-sketch">
                            <div class="col-9">
                                <div class="col-12 h-50 box-sketch-center border-sketch">Teras Depan (Kos) / Jalan</div>
                                <div class="col-12 d-flex">
                                    <a id="5" class="col-4 room border-sketch" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Kamar 5
                                    </a>
                                    <a id="6" class="col-4 room border-sketch" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Kamar 6
                                    </a>
                                    <a id="7" class="col-4 room border-sketch" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Kamar 7
                                    </a>
                                </div>
                            </div>
                            <div class="col-3 d-flex">
                                <div class="col-2">
                                    <div class="col-12 h-200 box-sketch-center border-sketch text-to-bottom">
                                        Jalan
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="col-12 h-75 box-sketch-center border-sketch">
                                        Toilet
                                    </div>
                                    <div class="col-12 h-75 box-sketch-center border-sketch">
                                        Toilet
                                    </div>
                                    <div class="col-12 h-50 box-sketch-center border-sketch">
                                        Tempat Cuci
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" id="response">
        </div>
    </div>

    <!-- Script -->
    <script>
        // Get dom element
        let containerresponse = document.getElementById("response");
        let roombox = document.querySelectorAll("a.room.border-sketch");
        const containersketchcanvas = document.getElementById("sketch-canvas");
        const headerfloor = document.querySelectorAll("h5.m-0.text-nowrap.font-weight-bold.text-primary");
        let urlajax = "{{ route("sketch.index") }}";

        headerfloor[0].classList.add("active");

        function roomboxmodal() {
            roombox.forEach(room => {
                room.addEventListener("click", function () {
                    const xhrroom = new XMLHttpRequest();
                    xhrroom.onreadystatechange = function () {
                        if (xhrroom.readyState == 4 && xhrroom.status == 200) {
                            containerresponse.innerHTML = xhrroom.responseText;
                        }
                    };
                    
                    xhrroom.open("GET", urlajax + "/room/" + room.id, true);
                    
                    xhrroom.send();
                });
            });
        }

        headerfloor.forEach(floor => {
            floor.addEventListener("click", function () {
                // Script active link floor
                let floorActive = document.querySelector("h5.m-0.text-nowrap.font-weight-bold.text-primary.active")
                floorActive.classList.remove("active");
                floor.classList.toggle("active");
                
                // Script Ajax Floor
                const xhr = new XMLHttpRequest();

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        containersketchcanvas.innerHTML = xhr.responseText;
                        roombox = document.querySelectorAll("a.room.border-sketch");
                        roomboxmodal();
                    }
                };

                xhr.open("GET", urlajax + "/floor/" + floor.id, true);

                xhr.send();
            });
        })

        roomboxmodal();
        
    </script>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <!-- Template Main JS File -->
    {{-- <script src={{ asset("assets/js/main.js") }}></script> --}}
</body>

</html>