<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="{{ asset('assets/images/213222.jpg') }}">
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
    <link rel="stylesheet" href="{{ asset('assets/css/search.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pagination.css') }}">
    <!--
    
    TemplateMo 563 SEO Dream
    
    https://templatemo.com/tm-563-seo-dream
    
    -->

</head>

<body>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{ route('index') }}" class="logo">
                            <h4>PMB Websites <img src="assets/images/logo-icon.png" alt=""></h4>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            @auth
                                @if (auth()->user()->role == 'admin')
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
                                    <div class="main-blue-button">
                                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                            @csrf
                                            {{-- <button type="submit" class="btn btn-primary">Logout</button> --}}
                                            <button type="submit" class="btn btn-primary">Logout</button>
                                        </form>
                                    </div>

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
                <div class="col-lg-12 align-self-center wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="section-heading">
                        <div class="row">
                            <span class="col-lg-7 col-sm-7">
                                <h6>Judul Materi</h6>
                                <h2><span>{{ $materi->judul }}</span></h2>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $materiFile = ltrim($materi->file, 'assets/materi/');
                $materiPath = asset('assets/materi/' . $materiFile);
            @endphp
            <iframe src="{{ $materiPath }}" width="100%" height="650px"></iframe>
            <div class="col-lg-4 col-sm-4">
                <div class="about-item">
                    <div class="main-blue-button">
                        <a href="{{ route('Admin.materi.materi') }}">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/animation.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
