@extends('back.layout')

@section('content')
<h2> Voir l'article {{ $post->groupe }}</h2>

<textarea id="MyValue" name="MyValue"></textarea>
<div>
    <a href="javascript:alert(tinymce.EditorManager.get('MyValue').getContent({format : 'raw'}));">[getRawContents]</a>
    <a href="javascript:alert(tinymce.EditorManager.get('MyValue').getContent({format : 'text'}));">[getTextContents]</a>
    <a href="javascript:alert(tinymce.EditorManager.get('MyValue').getContent());">[getContents]</a>
</div>

<!-- <div>{{ $post->article}}</div> -->
<script src="https://cdn.tiny.cloud/1/kjpm3b2ydsyvpgvasapxjnjqny49qu9wpn2xihd8hlfxftp2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

@endsection
