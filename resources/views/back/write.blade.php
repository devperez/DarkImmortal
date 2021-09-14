@extends('back.layout')

@section('content')
<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<!-- Include stylesheet -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<h3>Rédaction d'un article</h3>
<hr>
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
@csrf    
    <label>Nom du groupe : </label>
    <input class="container" name="groupe"/>
    <label>Pays d'origine :</label>
    <input class="container" name="pays"/>
    <label>Titre du morceau :</label>
    <input class="container" name="titre"/>
    <label>Album :</label>
    <input class="container" name="album" />
    <label>Illustration :</label>
    <div>
        <input type='file' class="container" name="image" onchange='preview()'/>
        <input type="hidden" name="MAX_FILE_SIZE" value="100000">
        <img id="frame" width="100px" height="100px" type="hidden"/>
    </div>
    <label>Genre :</label>
    <input class="container" name="genre" style="margin-bottom:50px" />

    <div id="quill_editor"></div>
    <input type="hidden" id="quill_html" name="post"></input>
    <button type="submit" class="btn btn-primary" style="margin-top:50px">Envoyer !</button>
</form>


<script>
//preview de l'image
function preview() {
    frame.src=URL.createObjectURL(event.target.files[0]);
}

    var quill = new Quill('#quill_editor', {
            theme: 'snow'
    });
   quill.on('text-change', function(delta, oldDelta, source) {
        document.getElementById("quill_html").value = quill.root.innerHTML;
    });
</script>

@endsection