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
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-seo-dream.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">

    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>

    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script> --}}
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/ckeditor.js"></script> --}}
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
                            <h4>PMB Websites <img src="{{ asset('assets/images/logo-icon.png') }}" alt=""></h4>
                        </a>
                        <!-- ***** Logo End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    <div id="contact" class="contact-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <form id="contact" action="{{ route('berita.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="section-heading">
                                    <h2><span>Tambah Berita</span></h2>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <input type="text" id="judul" name="judul" placeholder="Judul"
                                                required>
                                            @error('judul')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input type="file" id="gambar" name="gambar" required>
                                            @error('gambar')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input type="text" name="keterangan_gambar" id="keterangan_gambar"
                                                placeholder="Keterangan Gambar" required>
                                            @error('keterangan_gambar')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input type="date" id="tanggal" name="tanggal" required>
                                            @error('tanggal')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input type="hidden" name="username" value="{{ $user->name }}" required>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <input type="hidden" name="editor" value="{{ $editorName }}" required>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6">
                                        <fieldset>
                                            <select name="status" id="status" required>
                                                @if ($isAdmin)
                                                    @foreach ($statuses as $status)
                                                        <option value="{{ $status }}">
                                                            {{ \App\Enums\Status::getDescription($status) }}</option>
                                                    @endforeach
                                                @else
                                                    <option value="Draft">
                                                        {{ \App\Enums\Status::getDescription('Draft') }}</option>
                                                    <option value="Submit">
                                                        {{ \App\Enums\Status::getDescription('Submit') }}</option>
                                                @endif
                                            </select>
                                            @error('status')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <textarea id="isi_berita" style="display: none;"></textarea>
                                            <input type="hidden" id="hidden_isi_berita" name="isi_berita" required>
                                            <script>
                                                ClassicEditor
                                                    .create(document.querySelector('#isi_berita'), {
                                                        removePlugins: ['Title', 'Table', 'TableToolbar'],
                                                        allowedContent: 'h1 h2 h3 h4 h5 h6 p blockquote strong em ul ol li a img',
                                                        enterMode: 'BR',
                                                        shiftEnterMode: 'BR',
                                                    })
                                                    .then(editor => {
                                                        const hiddenField = document.querySelector('#hidden_isi_berita');
                                                        editor.model.document.on('change:data', () => {
                                                            hiddenField.value = editor.getData();
                                                        });
                                                    })
                                                    .catch(error => {
                                                        console.error(error);
                                                    });
                                            </script>
                                            @error('isi_berita')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                    @if ($isAdmin)
                                        <div class="col-lg-6">
                                            <fieldset>
                                                <input type="text" name="tag" id="tag" placeholder="Tag"
                                                    required>
                                                @error('tag')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6">
                                            <fieldset>
                                                <input type="text" name="comments" id="comments"
                                                    placeholder="Comments" required>
                                                @error('comments')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                        </div>
                                    @endif
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <div class="main-blue-button">
                                                <button type="submit" id="form-submit" class="main-button"
                                                    name="tambah">Simpan</button>
                                                <button type="reset" class="main-button ">Reset</button>
                                                <a href="{{ route('Admin.berita.berita') }}">Back</a>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="contact-info">
                                    <div class="icon">
                                        <img src="{{ asset('assets/images/tambahberita.png') }}" alt="email icon">
                                    </div>
                                    <br>
                                    <ul>
                                        <li><a href="#">Tambah Berita</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Load app.js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Inisialisasi CKEditor -->
    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            var editorData = ClassicEditor.instances['isi_berita'].getData();
            editorData = editorData.replace(/<\/?p[^>]*>/g, "");
        });
    </script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/animation.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>
