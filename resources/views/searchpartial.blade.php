@extends('search')
@section('search')


@foreach($posts as $post)

    {{ $post->groupe }}

@endforeach

@endsection