<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="../image/x-icon" href="../assets/images/213222.jpg" />
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

    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script> --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
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
                        <!-- ***** Menu Start ***** -->
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

    <div id="contact" class="contact-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <form id="contact" action="{{ route('Admin.berita.update', $berita->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Other form fields -->
                        <div class="col-lg-6">
                            <fieldset>
                                <input type="text" name="judul" class="form-control" id="judul"
                                    value="{{ old('judul', $berita->judul) }}" required>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset>
                                <input type="file" name="gambar" class="form-control" id="gambar">
                                @if ($berita->gambar)
                                    <img src="{{ asset($berita->gambar) }}" alt="Gambar Berita"
                                        style="width: 100px; height: auto;">
                                @endif
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset>
                                <input type="text" name="keterangan_gambar" class="form-control"
                                    id="keterangan_gambar"
                                    value="{{ old('keterangan_gambar', $berita->keterangan_gambar) }}" required>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset>
                                <input type="date" name="tanggal" class="form-control" id="tanggal"
                                    value="{{ old('tanggal', $berita->tanggal) }}" required>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset>
                                <select name="status" class="form-control" id="status" required>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status }}"
                                            {{ $berita->status == $status ? 'selected' : '' }}>
                                            {{ \App\Enums\Status::getDescription($status) }}
                                        </option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <textarea name="isi_berita" class="form-control" id="isi_berita" cols="30" rows="10" required>{{ old('isi_berita', $berita->isi_berita) }}</textarea>
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
                            </fieldset>
                        </div>
                        @if (Auth::user()->role == 'admin')
                            <div class="col-lg-12">
                                <fieldset>
                                    <input type="text" name="tag" class="form-control" id="tag"
                                        value="{{ old('tag', $berita->tag) }}" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input type="text" name="comments" class="form-control" id="comments"
                                        value="{{ old('comments', $berita->comments) }}" required>
                                </fieldset>
                            </div>
                        @endif
                        <div class="col-lg-12">
                            <fieldset>
                                <div class="main-blue-button">
                                    <button type="submit" id="form-submit" class="main-button ">Simpan</button>
                                    <button type="reset" id="form-submit" class="main-button ">Reset</button>
                                    <a href="{{ route('Admin.berita.berita') }}">Back</a>
                                </div>
                            </fieldset>
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
            document.querySelector('#hidden_isi_berita').value = editorData;
        });
    </script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/animation.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>
