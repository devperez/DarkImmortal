@extends('back.layout')

@section('content')


<div>
    <h1>{{ $post->groupe }}</h1>
    <div style="display:flex">
        <h2>{{ $post->album }}</h2>
        <h2>//{{ $post->titre }}</h2>
    </div>
    <img src=" {{ asset('storage/images/'.$post->image) }}" style="float:left; padding:10px" />
    <p>{!! $post->article !!}</p>
</div>

@endsection
