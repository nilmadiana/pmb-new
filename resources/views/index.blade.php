<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">

    <title>PMB STAI MAHAD ALY AL-HIKAM</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-seo-dream.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <!--

TemplateMo 563 SEO Dream

https://templatemo.com/tm-563-seo-dream

-->

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">
                            <h4>PMB Websites <img src="{{ asset('assets/images/logo-icon.png') }}" alt=""></h4>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index.php">Home</a></li>
                            <li class="scroll-to-section"><a href="index.php#brosur">Brosur</a></li>
                            <li class="scroll-to-section"><a href="index.php#alur">Alur Pendaftaran</a></li>
                            <li class="scroll-to-section"><a href="index.php#berita">Berita</a></li>
                            <li class="scroll-to-section"><a href="index.php#materi">Materi</a></li>
                            @auth
                                <!-- Jika pengguna sudah login -->
                                @if (auth()->user()->role == 'admin')
                                    <li class="scroll-to-section"><a href="{{ route('Admin.panduan.panduan') }}">Panduan</a>
                                    </li>
                                @endif
                                <li class="scroll-to-section">
                                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Logout</button>
                                    </form>
                                </li>
                            @else
                                <!-- Jika pengguna belum login -->
                                <li class="scroll-to-section"><a href="{{ route('login') }}"
                                        class="btn btn-primary">Login</a></li>
                            @endauth
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- Dashboard Start -->
    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="1s">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="info-stat">
                                            <h6>Tanggal :</h6>
                                            <h4><?php
                                            
                                            $tanggal = date('Y/m/d');
                                            
                                            switch (date('m', strtotime($tanggal))) {
                                                case '01':
                                                    $bulan = 'Januari';
                                                    break;
                                                case '02':
                                                    $bulan = 'Februari';
                                                    break;
                                                case '03':
                                                    $bulan = 'Maret';
                                                    break;
                                                case '04':
                                                    $bulan = 'April';
                                                    break;
                                                case '05':
                                                    $bulan = 'Mei';
                                                    break;
                                                case '06':
                                                    $bulan = 'Juni';
                                                    break;
                                                case '07':
                                                    $bulan = 'Juli';
                                                    break;
                                                case '08':
                                                    $bulan = 'Agustus';
                                                    break;
                                                case '09':
                                                    $bulan = 'September';
                                                    break;
                                                case '10':
                                                    $bulan = 'Oktober';
                                                    break;
                                                case '11':
                                                    $bulan = 'November';
                                                    break;
                                                case '12':
                                                    $bulan = 'Desember';
                                                    break;
                                            
                                                default:
                                                    $bulan = 'Tidak diketahui';
                                                    break;
                                            }
                                            
                                            echo date('d', strtotime($tanggal)) . ' ' . $bulan . ' ' . date('Y', strtotime($tanggal)); ?></h4>

                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="info-stat">
                                            <h6> Jam : </h6>
                                            <h4><span id="jam"></span></h4>
                                            <script type="text/javascript">
                                                window.onload = function() {
                                                    jam();
                                                }

                                                function jam() {
                                                    var e = document.getElementById('jam'),
                                                        d = new Date(),
                                                        h, m, s;
                                                    h = d.getHours();
                                                    m = set(d.getMinutes());
                                                    s = set(d.getSeconds());

                                                    e.innerHTML = h + ':' + m + ':' + s;

                                                    setTimeout('jam()', 1000);
                                                }

                                                function set(e) {
                                                    e = e < 10 ? '0' + e : e;
                                                    return e;
                                                }
                                            </script>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h2>Welcome to PMB STAI Ma'had Aly Al-Hikam Malang</h2>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="main-green-button scroll-to-section">
                                            <a href="https://daftar.staima-alhikam.ac.id/" target="_blank">Link
                                                Pendaftaran</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        @foreach ($panduanTerbaru as $panduan)
                                            <div class="main-green-button scroll-to-section">
                                                <a href="{{ route('panduan.show', $panduan->id) }}"
                                                    target="_blank">Panduan PMB
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="{{ asset('assets/images/banner-right-image.png') }}"
                                    class="animated infinite bounce">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard End -->

    <!-- Brosur Start -->
    <div id="brosur" class="features section">
        <div class="container">
            <div class="row">
                <div class="col-lg offset-lg">
                    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <h2 style="text-align: center;">Brosur <span>PMB </span> <em>STAIMA AL-HIKAM MALANG</em></h2>
                    </div>
                    @auth
                        @if (auth()->user()->role == 'admin')
                            <div class="main-green-button scroll-to-section">
                                <a href="{{ route('Admin.brosur.brosur') }}">Semua Brosur</a>
                            </div>
                        @endif
                    @endauth
                </div>
                @foreach ($brosurTerbaru as $brosur)
                    <div class="col-lg-12">
                        <div class="features-item first-feature wow fadeInUp" data-wow-duration="1s">
                            <div class="features-content">
                                <div class="row">
                                    <h4 align="center"><b>{{ $brosur->judul }}</b></h4>
                                    <img src="{{ asset($brosur->gambar) }}" width='200' height='auto'
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Brosur End -->


    <!-- Alur Start -->
    <div id="alur" class="features section">
        <div class="container">
            <div class="row">
                <div class="col-lg offset-lg">
                    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <h2 style="text-align: center;">Alur Pendaftaran <span>PMB </span> <em>STAIMA AL-HIKAM
                                MALANG</em></h2>
                        <br>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="features-content">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="features-item first-feature wow fadeInUp" data-wow-duration="1s"
                                    data-wow-delay="0s">
                                    <div class="first-number number">
                                        <h6>01</h6>
                                    </div>
                                    <div class="icon"></div>
                                    <h4>Memilih Jalur Pendaftaran</h4>
                                    <div class="line-dec"></div>
                                    <p>Pahami terlebih dahulu syarat, ketentuan, dan prosedur PMB STAIMA Al-Hikam
                                        Malang. <br><a rel="nofollow" href="https://daftar.staima-alhikam.ac.id/"
                                            target="_blank">Baca Ketentuan</a></br></p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="features-item second-feature wow fadeInUp" data-wow-duration="1s"
                                    data-wow-delay="0.2s">
                                    <div class="second-number number">
                                        <h6>02</h6>
                                    </div>
                                    <div class="icon"></div>
                                    <h4>Mengisi Formulir Pendaftaran</h4>
                                    <div class="line-dec"></div>
                                    <p>Isi formulir pendaftaran sesuai dengan data diri anda.</p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="features-item first-feature wow fadeInUp" data-wow-duration="1s"
                                    data-wow-delay="0.4s">
                                    <div class="third-number number">
                                        <h6>03</h6>
                                    </div>
                                    <div class="icon"></div>
                                    <h4>Login Akun Pendaftaran</h4>
                                    <div class="line-dec"></div>
                                    <p>Login menggunakan PIN yang telah didapatkan.</p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="features-item second-feature last-features-item wow fadeInUp"
                                    data-wow-duration="1s" data-wow-delay="0.6s">
                                    <div class="fourth-number number">
                                        <h6>04</h6>
                                    </div>
                                    <div class="icon"></div>
                                    <h4>Pembayaran dan Verifikasi Data</h4>
                                    <div class="line-dec"></div>
                                    <p>Lakukan pembayaran dan verifikasi data sesuai dengan biodata.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Alur End -->


    <!-- Berita Start -->
    <div id="berita" class="our-portfolio section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h6>Berita</h6>
                        <h2>Pusat informasi <em>mengenai</em> <span>PMB STAIMA Al-Hikam Malang Tahun Akademik
                                2024</span></h2>
                        <div class="main-green-button scroll-to-section">
                            <a href="{{ route('Admin.berita.berita') }}">Semua Berita</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
            <div class="row">
                <div class="col-lg-12">
                    <div class="loop owl-carousel">
                        @foreach ($beritaTerbaru as $berita)
                            <div class="item">
                                <div class="portfolio-item">
                                    <div class="thumb">
                                        <img src="{{ asset($berita->gambar) }}" width='200' height='400'
                                            alt="">
                                        <div class="hover-content">
                                            <div class="inner-content">

                                                <a href="{{ route('berita.show', $berita->id) }}">
                                                    <h4>{{ $berita->judul }}</h4>
                                                </a>
                                                <span>
                                                    {{ Str::limit(strip_tags($berita->isi_berita), 100, '...') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Berita End -->


    <!-- Materi Start -->
    <div id="materi" class="our-services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <h6>Materi</h6>
                        <h2>Materi <span>PMB </span> <em> STAIMA AL-HIKAM MALANG</em></h2>
                        <div class="main-green-button scroll-to-section">
                            <div class="main-green-button scroll-to-section">
                                <a href="{{ route('Admin.materi.materi') }}">Semua Materi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                @foreach ($materiTerbaru as $materi)
                    <div class="col-lg-4">
                        <div class="service-item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="icon">
                                        <img src="{{ asset('assets/images/service-icon-01.png') }}"
                                            class="animated infinite bounce" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="right-content">
                                        <a href="{{ route('materi.show', $materi->id) }}">
                                            <h4>{{ $materi->judul }}</h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Materi End -->



    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/animation.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>
