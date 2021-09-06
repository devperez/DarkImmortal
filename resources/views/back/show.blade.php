@extends('back.layout')

@section('content')


<div>
    <h1>{{ $post->groupe }}</h1>
    <h2>{{ $post->album }}</h2>
    <p>{{ $post->article }}</p>
</div>

@endsection
