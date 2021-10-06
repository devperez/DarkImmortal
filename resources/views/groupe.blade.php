@extends('layouts.menu')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="{{ asset('css/layout.css') }}" rel="stylesheet">
<link href="{{ asset('css/Hover-master/css/hover.css') }}" rel="stylesheet">

<div class="couv" style="background-image: url('{{ asset('/storage/images/couv/'. $post->couv) }}')"></div>

<div style="margin-right:80px; margin-left:80px;">
    <div class="row">
        <div class="col" style="margin-top:15px">
            <a href="{{ route('liste', $post->groupe) }}"><h1 class="hvr-underline-from-center">{{ $post->groupe }}</h1></a>
            <div style="display:flex; justify-content:center;">
                <h2>{{ $post->album }}/</h2>
                <h2>/{{ $post->titre }}</h2>
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
            <iframe style="float:right" width="800px" height="400px" src="{!! $clip !!}"></iframe>
        </div>
    </div>
        @endisset

    
    <div class="container-fluid" style="margin-bottom:150px">
        <hr>
        <h3>Vous aimerez peut-être aussi :</h3>
        <div class="row grid gap-5"  style="margin-bottom:15px">
        @foreach($alikes as $alike)
            <div class="col-md-3 col-xs-3 col-sm-3 mb-3">
                <div class="card h-100">
                    <div class="card-image">
                        <a href="{{ route('groupe', $alike->id) }}"><img src="{{ asset('storage/images/'.$alike->image) }}" class="card-image" /></a>
                    </div>
                    <div class="card-text">
                        <span class="date">publié le {{ $alike->created_at->format('d/m/Y à H:i:s') }}</span>
                        <h2>{{ $alike->groupe }}</h2>
                        <p>{!! $alike->very_short_description !!}</p>
                    </div>
                    <div class="card-stats">
                        <div class="stat">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>


@endsection

