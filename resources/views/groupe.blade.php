@extends('layouts.menu')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="{{ asset('css/layout.css') }}" rel="stylesheet">

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a href="{{ route('liste', $post->groupe) }}"><h1 class="groupetitre">{{ $post->groupe }}</h1></a>
            <div style="display:flex; justify-content:center;">
                <h2>{{ $post->album }}</h2>
                <h2> // {{ $post->titre }}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <img src=" {{ asset('storage/images/'.$post->image) }}" style="float:left; padding:10px; width:400px" />
            <p>{!! $post->article !!}</p>
        </div>
        @isset($clip)
        <div class="col">
            <iframe width="800px" height="400px" src="{!! $clip !!}"></iframe>
        </div>
        @endisset
    </div>
</div>
@endsection

