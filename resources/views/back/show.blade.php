@extends('back.layout')

@section('content')


    <div class=container-fluid>
        <div class="row">
            <div class="col" style="margin-top:15px">
                <h1 class="hvr-underline-from-center">{{ $post->groupe }}</h1>
                <div style="display:flex; justify-content:center;">
                    <h2>{{ $post->album }}/</h2>
                    <h2>/{{ $post->titre }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12" style="margin-bottom:50px;">
                <img src=" {{ asset('storage/images/'.$post->image) }}" style="float:left; padding:10px; width:400px" />
                <p class="article">{!! $post->article !!}</p>
            </div>
            @isset($post->clip)
            <div class="col-lg-4 col-md-12" style="display:flex; justify-content:center; flex-direction:column; margin-top:50px;">
                <iframe width="400px" allowfullscreen height="200px" src="{!! $post->clip !!}"></iframe>
            @endisset
            @isset($post->paroles)
            <div style="margin-top:50px;" class="col-lg-10 col-md-12 paroles">
                <p>Paroles :</p>
                <p>{!! $post->paroles !!}</p>
            </div>
            @endisset
        </div>
    </div>

@endsection
