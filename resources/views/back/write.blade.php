@extends('back.layout')

@section('content')

<h3>Rédaction d'un article</h3>
<hr>
<form>
    <textarea class="container">
    Allons-y, Alonzo !
    </textarea>

    <button class="btn btn-primary" style="margin-top:100px">Envoyer !</button>
</form>

    <script src="https://cdn.tiny.cloud/1/kjpm3b2ydsyvpgvasapxjnjqny49qu9wpn2xihd8hlfxftp2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',

            image_class_list: [
            {title: 'img-responsive', value: 'img-responsive'},
            ],
            height: 500,
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste imagetools"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image ",

            image_title: true,
            automatic_uploads: true,
            images_upload_url: '/upload',
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            }
        });
</script>

@endsection