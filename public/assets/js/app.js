import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

document.addEventListener('DOMContentLoaded', function() {
    ClassicEditor
        .create(document.querySelector('#isi_berita'))
        .catch(error => {
            console.error(error);
        });
});