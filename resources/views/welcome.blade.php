@extends('layouts.menu')

@section('content')
    @foreach($posts as $post)
        {{ $post->groupe }}
    @endforeach
@endsection