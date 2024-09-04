<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/213222.jpg') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">

    <title>PMB STAI MAHAD ALY AL-HIKAM</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-seo-dream.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/search.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pagination.css') }}">
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
                        @auth
                            @if (auth()->user()->role == 'penulis')
                                <a href="{{ route('Admin.berita.berita') }}" class="logo">
                                    <h4>PMB Websites <img src="assets/images/logo-icon.png" alt=""></h4>
                                </a>
                            @else
                                <a href="{{ route('index') }}" class="logo">
                                    <h4>PMB Websites <img src="assets/images/logo-icon.png" alt=""></h4>
                                </a>
                            @endif
                        @endauth
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            @auth
                                @if (auth()->user()->role == 'penulis')
                                    <li class="scroll-to-section"><a href="{{ route('Admin.berita.berita') }}">Home</a>
                                    </li>
                                @else
                                    <li class="scroll-to-section"><a href="{{ route('index') }}">Home</a></li>
                                    <li class="scroll-to-section"><a href="{{ url('/#alur') }}">Alur Pendaftaran</a></li>
                                    <li class="scroll-to-section"><a href="{{ route('Admin.brosur.brosur') }}">Brosur</a>
                                    </li>
                                    <li class="scroll-to-section"><a href="{{ route('Admin.materi.materi') }}">Materi</a>
                                    </li>
                                    <li class="scroll-to-section"><a
                                            href="{{ route('Admin.panduan.panduan') }}">Panduan</a>
                                    </li>
                                @endif
                                <li class="scroll-to-section"><a href="{{ route('Admin.berita.berita') }}">Berita</a></li>
                                <!-- Jika pengguna sudah login -->
                                <li class="scroll-to-section">
                                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Logout</button>
                                    </form>
                                </li>
                            @else
                                <!-- Jika pengguna belum login -->
                                <li class="scroll-to-section"><a href="{{ route('index') }}">Home</a></li>
                                <li class="scroll-to-section"><a href="{{ url('/#alur') }}">Alur Pendaftaran</a></li>
                                <li class="scroll-to-section"><a href="{{ route('Admin.berita.berita') }}">Berita</a></li>
                                <li class="scroll-to-section"><a href="{{ route('Admin.materi.materi') }}">Materi</a></li>
                                <li class="scroll-to-section"><a href="{{ route('login') }}"
                                        class="main-blue-button">Login</a></li>
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

    <div id="about" class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{ asset($berita->gambar) }}" alt="Gambar Berita">
                    <h4><b>{{ $berita->keterangan_gambar }}</b></h4>
                </div>
                <div class="col-lg-6 align-self-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="section-heading">
                        <h6>{{ $berita->tanggal }}</h6>
                        <br>
                        <h6>{{ $berita->username }} | {{ $berita->editor }}</h6>
                        <h2>{{ $berita->judul }}</h2>
                    </div>
                    <p align="justify">{!! $berita->isi_berita !!}</p>
                    <div class="main-green-button"><a href="{{ Route('Admin.berita.berita') }}">Back</a></div>
                </div>
            </div>
        </div>
    </div>


    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/animation.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>
