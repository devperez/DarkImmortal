@extends('back.layout')

@section('content')
<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<!-- Include stylesheet -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <h2> Éditer l'article {{ $post->groupe }}</h2>
    <div class="container">
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        <label>Nom du groupe</label>
        <input value="{{ $post->groupe }}" class="container" name="groupe" />
        <label>Pays d'origine :</label>
        <input value="{{ $post->pays }}" class="container" name="pays"/>
        <label>Titre du morceau :</label>
        <input value="{{ $post->morceau }}" class="container" name="morceau"/>
        <label>Album :</label>
        <input value="{{ $post->album }}" class="container" name="album" />
        <label>Illustration :</label>
        <div>
            <input type='file' class="container" name="image" onchange='preview()'/>
            <input type="hidden" name="MAX_FILE_SIZE" value="100000">
            <img id="frame" width="100px" height="100px" src="{{ asset('storage/images/'.$post->image) }}" type="hidden"/>
        </div>
        <label>Couverture :</label>
        <div>
            <input type="file" class="container" name="couv" onchange="previewcouv()"/>
            <input type="hidden" name="MAX_FILE_SIZE" value="100000"/>
            <img id="frame2" width="250px" height="100px" src="{{ asset('storage/images/couv/'.$post->couv) }}" type="hidden" />
        </div>
        <label>Genre :</label>
        <input value="{{ $post->genre }}" class="container" name="genre" />

        <label>Vidéo :</label>
        <input value="{{ $post->clip }}" class="container" name="clip" />
        {!! $post->clip !!}
<br />
        <label>Paroles :</label>
        <textarea class="container" name="paroles" style="height:200px">{{ $post->paroles }}</textarea>

        <input type="hidden" id="quill_editor" />
    
        <textarea name="article" class="container" style="height:150px">{{ $post->article }}</textarea>
        @csrf
        <button class="btn btn-primary" style="margin-top:50px">Valider les changements</button>
        @method('PUT')
    </form>
</div>
<script>
    //preview image
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
        document.getElementById("quill_editor").value = quill.root.innerHTML;
    });
</script>

@endsection