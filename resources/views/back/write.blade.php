@extends('back.layout')

@section('content')
<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<!-- Include stylesheet -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<h3>Rédaction d'un article</h3>
<hr>
<div class="container">
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @error('groupe')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @csrf    
        <label>Nom du groupe : </label>
        <input id='groupe' class="container @error('groupe') is-invalid @enderror" name="groupe"/>
        <label>Pays d'origine :</label>
        <input class="container" name="pays"/>
        <label>Titre du morceau :</label>
        <input id="morceau" class="container" name="morceau"/>
        <label>Album :</label>
        <input class="container" name="album" />
        <label>Illustration :</label>
        <div>
            <input type='file' class="container" name="image" onchange='preview()'/>
            <input type="hidden" name="MAX_FILE_SIZE" value="100000">
            <img id="frame" width="100px" height="100px" type="hidden"/>
        </div>
        <label>Couverture :</label>
        <div>
            <input type="file" class="container" name="couv" onchange="previewcouv()"/>
            <input type="hidden" name="MAX_FILE_SIZE" value="100000"/>
            <img id="frame2" width="250px" height="100px" type="hidden" />
        </div>
        <label>Genre :</label>
        <input class="container" name="genre" />

        <label>Vidéo :</label>
        <input class="container" name="clip" />

        <label>Paroles :</label>
        <textarea class="container" name="paroles" style="margin-bottom:50px; height:200px;"></textarea>

        <div id="quill_editor" style="height:150px"></div>
        <input type="hidden" id="quill_html" name="article"></input>
        <label>Si vous souhaitez ne pas publier et enregistrer un brouillon, cochez cette case :
        <input type="checkbox" name="draft"></input><br />
        <button type="submit" class="btn btn-primary" style="margin-top:25px">Envoyer !</button>
    </form>
</div>

<script>
//preview de l'image
function preview() {
    frame.src=URL.createObjectURL(event.target.files[0]);
}

//preview de la couverture
function previewcouv() {
    frame2.src=URL.createObjectURL(event.target.files[0]);
}

var quill = new Quill('#quill_editor', {
    theme: 'snow'
});
quill.on('text-change', function(delta, oldDelta, source) {
    document.getElementById("quill_html").value = quill.root.innerHTML;
});
</script>

@endsection