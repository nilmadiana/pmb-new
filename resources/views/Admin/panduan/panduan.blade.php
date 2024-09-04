<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="assets/images/213222.jpg" />
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
                                    <li class="scroll-to-section"><a href="{{ route('Admin.berita.berita') }}">Berita</a>
                                    </li>
                                    <li class="scroll-to-section"><a href="{{ route('Admin.materi.materi') }}">Materi</a>
                                    </li>
                                    <li class="scroll-to-section"><a href="{{ route('Admin.panduan.panduan') }}">Panduan</a>
                                    </li>
                                @endif
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
                                <li class="scroll-to-section"><a href="{{ route('Admin.panduan.panduan') }}">Panduan</a></li>
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
                <div class="col-lg-12 align-self-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="section-heading">
                        <div class="row" method="GET" action="search.php">
                            <span class="col-lg-7 col-sm-7">
                                <h6>Panduan Penerimaan Mahasiswa Baru</h6>
                                <h2>STAI Ma'had Aly Al-Hikam <em>Malang</em> &amp; Upload Panduan <span>Baru</span></h2>
                            </span>
                            <div class="col-lg-5 col-sm-5">
                                <form action="{{ route('search4') }}" method="GET">
                                    <input type="search" name="query4" placeholder="Cari Panduan berdasarkan judul"
                                        value="{{ request()->query('query4') }}">
                                    <button type="submit">Cari</button>
                                </form>
                            </div>
                            @auth
                                @if (auth()->user()->role == 'admin')
                                    <div class="main-green-button">
                                        <a href="{{ route('panduan.create') }}">Upload Panduan Baru</a>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>

                @foreach ($panduans as $panduan)
                    <div class="row">
                        <div class="col-lg-4 col-sm-4">
                            <div class="about-item">
                                <h6><b><a href="{{ route('panduan.show', $panduan->id) }}">{{ $panduan->judul }}</a></b>
                                </h6>
                            </div>
                        </div>
                        @auth
                            <div class="col-lg-4 col-sm-4">
                                <div class="about-item">
                                    <div class="main-blue-button">
                                        <a href="{{ route('Admin.panduan.edit', $panduan->id) }}">Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                                <div class="about-item">
                                    <form action="{{ route('Admin.panduan.destroy', $panduan->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-warning btn-group btn-group-form">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endauth
                    </div>
                @endforeach

            </div>

            <div class="pagination-wrapper">
                <div class="pagination justify-content-center">
                    {{ $panduans->links('pagination::bootstrap-4') }}
                </div>
                <div class="pagination-details">
                    <p>Showing {{ $panduans->firstItem() }} to {{ $panduans->lastItem() }} of {{ $panduans->total() }}
                        results</p>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var deleteForms = document.querySelectorAll('form[action*=/panduan/]');

            deleteForms.forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    var confirmed = confirm('Are you sure you want to delete this Panduan?');
                    if (!confirmed) {
                        event.preventDefault();
                    }
                });
            });
        });
    </script>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/animation.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
