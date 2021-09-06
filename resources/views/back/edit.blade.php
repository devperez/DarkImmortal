@extends('back.layout')

@section('content')
<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<!-- Include stylesheet -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<h2> Éditer l'article {{ $post->groupe }}</h2>
<form action="{{ route('posts.update', $post->id) }}" method="POST">
    <label>Nom du groupe</label>
    <input value="{{ $post->groupe }}" class="container" name="groupe" />
    <label>Pays d'origine :</label>
    <input value="{{ $post->pays }}" class="container" name="pays"/>
    <label>Titre du morceau :</label>
    <input value="{{ $post->titre }}" class="container" name="titre"/>
    <label>Album :</label>
    <input value="{{ $post->album }}" class="container" name="album" />
    <label>Illustration:</label>
    <input value="{{ $post->image }}" class="container" name="image" />
    <label>Genre :</label>
    <input value="{{ $post->genre }}" class="container" name="genre" style="margin-bottom:50px" />
    <!-- <textarea name="article">{{ $post->article}}</textarea> -->
    
    <input value="{{ $post->article }}" id="quill_editor" name="post" class="container"></input>
    @csrf
    <button class="btn btn-primary" style="margin-top:50px">Valider les changements</button>
    @method('PUT')
</form>

<script>
    var quill = new Quill('#quill_editor', {
            theme: 'snow'
    });
   quill.on('text-change', function(delta, oldDelta, source) {
        document.getElementById("quill_editor").value = quill.root.innerHTML;
    });
</script>

@endsection