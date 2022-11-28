<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="shortcut icon" href="{{ asset('/assets/img/favicon.ico') }}" type="image/x-icon">

    <title>Daarus Sa'adah</title>
    <meta name="description" content="Daarus Sa'adah adalah penyewaan kos yang berada di kawasan Politeknik Negeri Malang, Tepatnya di jalan semanggi barat nomor 18">
    <meta name="google-site-verification" content="SdaFHswtNOCt0eq2ujDoPIH_pl5PQSPA5fyzgX25W3U">
    <meta name="robots" content="noindex,nofollow">

<!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-EKQ9QXK24V"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-EKQ9QXK24V');
    </script>

    <!-- Favicons -->
    {{-- <link href={{ asset("assets/img/favicon.png") }} rel="icon">
    <link href={{ asset("assets/img/apple-touch-icon.png") }} rel="apple-touch-icon"> --}}

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href={{ asset("assets/vendor/aos/aos.css") }} rel="stylesheet">
    <link href={{ asset("assets/vendor/bootstrap/css/bootstrap.min.css") }} rel="stylesheet">
    <link href={{ asset("assets/vendor/bootstrap-icons/bootstrap-icons.css") }} rel="stylesheet">
    <link href={{ asset("assets/vendor/boxicons/css/boxicons.min.css") }} rel="stylesheet">
    <link href={{ asset("assets/vendor/glightbox/css/glightbox.min.css") }} rel="stylesheet">
    <link href={{ asset("assets/vendor/remixicon/remixicon.css") }} rel="stylesheet">
    <link href={{ asset("assets/vendor/swiper/swiper-bundle.min.css") }} rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href={{ asset("assets/css/style.css") }} rel="stylesheet">
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <h1><a href="index.html"><span>Daarus Sa'adah</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
            <li><a class="nav-link scrollto" href="#features">Fasilitas</a></li>
            <li><a class="nav-link scrollto" href="#gallery">Galeri</a></li>
            <li><a class="nav-link scrollto" href="#pricing">Harga</a></li>
            <li class="dropdown"><a href="#"><span>Data</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="{{ route("sketch.index") }}">Data Denah</a></li>
                    {{-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                        <ul>
                        <li><a href="#">Deep Drop Down 1</a></li>
                        <li><a href="#">Deep Drop Down 2</a></li>
                        <li><a href="#">Deep Drop Down 3</a></li>
                        <li><a href="#">Deep Drop Down 4</a></li>
                        <li><a href="#">Deep Drop Down 5</a></li>
                        </ul>
                    </li> --}}
                </ul>
            </li>
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            <li><a class="nav-link scrollto" href="{{ url("/login") }}">Login</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">

        <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
            <div data-aos="zoom-out">
                <h1>Cari kos sambil rebahan dengan <span>Daarus Sa'adah</span></h1>
                <h2>Cari kos jadi lebih mudah dan tidak perlu keliling kota</h2>
                <div class="text-center text-lg-start">
                <a href="#about" class="btn-get-started scrollto">Lihat lebih lanjut</a>
                </div>
            </div>
            </div>
            <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
            <img src="{{ asset("img/undraw_home1.svg") }}" class="img-fluid animated" alt="">
            </div>
        </div>
        </div>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
            <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
        </defs>
        <g class="wave1">
            <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
        </g>
        <g class="wave2">
            <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
        </g>
        <g class="wave3">
            <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
        </g>
        </svg>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
        <div class="container-fluid">

            <div class="row">
            <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch" data-aos="fade-right">
                {{-- <img src="{{ asset("img/undraw_home2.svg") }}" class="glightbox play-btn mb-4"/> --}}
            </div>

            <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">
                <h3>Tentang Daarus Sa'adah</h3>
                <p>Daarus Sa'adah adalah kos-kosan mahasiswa khusus laki-laki yang terletak pada jalan Semanggi Barat no.18 yang memiliki beberapa keunggulan, diantaranya</p>

                <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon"><i class="bx bx-fingerprint"></i></div>
                <h4 class="title"><a href="">Jarak ke kampus yang dekat</a></h4>
                <p class="description">Kos Daarus Sa'adah memiliki lokasi yang dekat dengan kampus Politeknik Negeri Malang, kita hanya perlu berjalan kaki kurang lebih 5 menit</p>
                </div>

                <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                <div class="icon"><i class="bx bx-gift"></i></div>
                <h4 class="title"><a href="">Harga relatif murah</a></h4>
                <p class="description">Harga kos Daarus Saa'dah jauh lebih murah dibandingkan dengan kos yang terdapat disekitar kampus Politeknik Negeri Malang yang biasanya mempunyai harga yang lumayan tinggi</p>
                </div>

                <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                <div class="icon"><i class="bx bx-atom"></i></div>
                <h4 class="title"><a href="">Fasilitas kos yang lumayan lengkap</a></h4>
                <p class="description">Daarus Sa'adah menyediakan fasilitas berupa meja, kursi, lemari dan juga kasur, termasuk gratis listrik, air dan parkir kendaraan yang aman</p>
                </div>

            </div>
            </div>

        </div>
        </section><!-- End About Section -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
            <h2></h2>
            <p>Fasilitas kos Daarus Sa'adah</p>
            </div>

            <div class="row" data-aos="fade-left">
                <div class="col-lg-3 col-md-4">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                    <i class="ri-store-line" style="color: #ffbb2c;"></i>
                    <h3><a>Gratis listrik & air</a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                    <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
                    <h3><a>Parkir sepeda motor</a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="150">
                    <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
                    <h3><a>Kamar mandi luar</a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                    <i class="ri-paint-brush-line" style="color: #e361ff;"></i>
                    <h3><a>Perabotan lengkap</a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mt-4">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="250">
                    <i class="ri-database-2-line" style="color: #47aeff;"></i>
                    <h3><a>Tempat jemur pakaian</a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mt-4">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                    <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
                    <h3><a>Lingkungan yang bersih</a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mt-4">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="350">
                    <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
                    <h3><a>Keamanan terjaga</a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mt-4">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="400">
                    <i class="ri-price-tag-2-line" style="color: #4233ff;"></i>
                    <h3><a>Jam malam khusus tamu</a></h3>
                    </div>
                </div>
            </div>
        </div>
        </section><!-- End Features Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
        <div class="container">
            <div class="row" data-aos="fade-up">
                <div class="col-lg-3 col-md-6">
                    <div class="count-box">
                    <i class="bi bi-emoji-smile"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{ $total_rooms }}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Jumlah kamar</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                    <div class="count-box">
                    <i class="bi bi-journal-richtext"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{ $total_dormitories }}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Jumlah penghuni kos</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                    <i class="bi bi-headset"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{ $total_transactions }}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Jumlah transaksi</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                    <div class="count-box">
                    <i class="bi bi-people"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{ $total_users }}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Jumlah admin kos</p>
                    </div>
                </div>
            </div>
        </div>
        </section><!-- End Counts Section -->

        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Gambar Kos</h2>
                <p>Preview kos Daarus Sa'adah</p>
            </div>

            <div class="row g-0" data-aos="fade-left">
                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                    <a href="{{ asset("img/bg-kos1.webp") }}" class="gallery-lightbox">
                        <img src="{{ asset("img/bg-kos1.webp") }}" loading="lazy" alt="" class="img-fluid">
                    </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="150">
                    <a href="{{ asset("img/bg-kos2.webp") }}" class="gallery-lightbox">
                        <img src="{{ asset("img/bg-kos2.webp") }}" loading="lazy" alt="" class="img-fluid">
                    </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200">
                    <a href="{{ asset("img/bg-kos3.webp") }}" class="gallery-lightbox">
                        <img src="{{ asset("img/bg-kos3.webp") }}" loading="lazy" alt="" class="img-fluid">
                    </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="250">
                    <a href="{{ asset("img/bg-kos4.webp") }}" class="gallery-lightbox">
                        <img src="{{ asset("img/bg-kos4.webp") }}" loading="lazy" alt="" class="img-fluid">
                    </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
                    <a href="{{ asset("img/bg-kos5.webp") }}" class="gallery-lightbox">
                        <img src="{{ asset("img/bg-kos5.webp") }}" loading="lazy" alt="" class="img-fluid">
                    </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="350">
                    <a href="{{ asset("img/bg-kos6.webp") }}" class="gallery-lightbox">
                        <img src="{{ asset("img/bg-kos6.webp") }}" loading="lazy" alt="" class="img-fluid">
                    </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="400">
                    <a href="{{ asset("img/bg-kos7.webp") }}" class="gallery-lightbox">
                        <img src="{{ asset("img/bg-kos7.webp") }}" loading="lazy" alt="" class="img-fluid">
                    </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="450">
                    <a href="{{ asset("img/bg-kos8.webp") }}" class="gallery-lightbox">
                        <img src="{{ asset("img/bg-kos8.webp") }}" loading="lazy" alt="" class="img-fluid">
                    </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="450">
                    <a href="{{ asset("img/bg-kos9.webp") }}" class="gallery-lightbox">
                        <img src="{{ asset("img/bg-kos9.webp") }}" loading="lazy" alt="" class="img-fluid">
                    </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="450">
                    <a href="{{ asset("img/bg-kos10.webp") }}" class="gallery-lightbox">
                        <img src="{{ asset("img/bg-kos10.webp") }}" loading="lazy" alt="" class="img-fluid">
                    </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="450">
                    <a href="{{ asset("img/bg-kos11.webp") }}" class="gallery-lightbox">
                        <img src="{{ asset("img/bg-kos11.webp") }}" loading="lazy" alt="" class="img-fluid">
                    </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="450">
                    <a href="{{ asset("img/bg-kos6.webp") }}" class="gallery-lightbox">
                        <img src="{{ asset("img/bg-kos6.webp") }}" loading="lazy" alt="" class="img-fluid">
                    </a>
                    </div>
                </div>
            </div>
        </div>
        </section><!-- End Gallery Section -->

        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
            <h2></h2>
            <p>Harga kos Daarus Sa'adah</p>
            </div>

            <div class="row" data-aos="fade-left">
                <div class="col-lg-6 col-md-6">
                    <div class="box" data-aos="zoom-in" data-aos-delay="100">
                    <h3>Bulanan</h3>
                    <h4><sup>Rp</sup>550.000<span> / bulan</span></h4>
                    {{-- <ul>
                        <li></li>
                        <li>Nec feugiat nisl</li>
                        <li>Nulla at volutpat dola</li>
                        <li>Pharetra massa</li>
                        <li class="na">Massa ultricies mi</li>
                    </ul> --}}
                    <div class="btn-wrap">
                        <a href="https://api.whatsapp.com/send?phone=6285157582290&text=Permisi%2C%20apakah%20ada%20kamar%20kos%20yang%20kosong%3F%0A" target="_blank" class="btn-buy">Pesan Sekarang</a>
                    </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mt-4 mt-md-0">
                    <div class="box featured" data-aos="zoom-in" data-aos-delay="200">
                    <h3>Tahunan</h3>
                    <h4><sup>Rp</sup>6.600.000<span> / tahun</span></h4>
                    {{-- <ul>
                        <li></li>
                        <li>Nec feugiat nisl</li>
                        <li>Nulla at volutpat dola</li>
                        <li>Pharetra massa</li>
                        <li class="na">Massa ultricies mi</li>
                    </ul> --}}
                    <div class="btn-wrap">
                        <a href="https://api.whatsapp.com/send?phone=6285157582290&text=Permisi%2C%20apakah%20ada%20kamar%20kos%20yang%20kosong%3F%0A" target="_blank" class="btn-buy">Pesan Sekarang</a>
                    </div>
                    </div>
                </div>
            </div>

        </div>
        </section><!-- End Pricing Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
            <h2>Kontak Kami</h2>
            <p>Kontak kami melalui platform dibawah ini</p>
            </div>

            <div class="row">
                <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
                    <div class="info">
                        <a href="https://goo.gl/maps/rZ3NnAubTzEPVKN98" target="_blank">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>Jl. Semanggi Barat No.18, Lowokwaru, Malang</p>
                            </div>
                        </a>
                        <a href="https://mail.google.com/mail/u/0/?view=cm&tf=1&fs=1&to=service@daarus-saadah.my.id" target="_blank">
                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>service@daarus-saadah.my.id</p>
                            </div>
                        </a>
                        <a href="https://api.whatsapp.com/send?phone=6285157582290&text=Permisi%2C%20apakah%20ada%20kamar%20kos%20yang%20kosong%3F%0A" target="_blank">
                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Whatsapp:</h4>
                                <p>+62 813-3498-3535</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row justify-content-around">
                    <div class="col-lg-12 col-md-6">
                        <div class="footer-info">
                            <h3>Daarus Sa'adah</h3>
                            <p class="pb-3"><em>Cari kos jadi lebih mudah dan tidak perlu keliling kota</em></p>
                            <p>
                                Jl. Semanggi Barat No.18<br>Lowokwaru ,Malang<br>
                                <strong>Whatsapp:</strong>+62 813-3498-3535<br>
                                <strong>Email:</strong> service@daarus-saadah.my.id<br>
                            </p>
                            <div class="social-links mt-3">
                                <span >Copyright &copy; Bengak Kos 2022</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src={{ asset("assets/vendor/purecounter/purecounter_vanilla.js") }}></script>
    <script src={{ asset("assets/vendor/aos/aos.js") }}></script>
    <script src={{ asset("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}></script>
    <script src={{ asset("assets/vendor/glightbox/js/glightbox.min.js") }}></script>
    <script src={{ asset("assets/vendor/swiper/swiper-bundle.min.js") }}></script>
    <script src={{ asset("assets/vendor/php-email-form/validate.js") }}></script>

    <!-- Template Main JS File -->
    <script src={{ asset("assets/js/main.js") }}></script>

</body>

</html>