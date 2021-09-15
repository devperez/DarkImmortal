@extends('back.layout')

@section('content')


<div>
    <h1>{{ $post->groupe }}</h1>
    <h2>{{ $post->album }}</h2>
    <img src=" {{ asset('storage/images/'.$post->image) }}" style="height:100px" />
    <p>{!! $post->article !!}</p>
</div>

@endsection
