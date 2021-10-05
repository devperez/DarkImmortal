
@extends('layouts.menu')

@section('content')

<div class="container-fluid" style="margin-bottom:15px">
    <div class="row grid gap-5"  style="margin-bottom:15px">
    @foreach($posts as $post)
        <div class="col-md-3 col-xs-3 col-sm-3 mb-3">
            <div class="card h-100">
                <div class="card-image">
                    <a href="{{ route('groupe', $post->id) }}"><img src="{{ asset('storage/images/'.$post->image) }}" class="card-image" /></a>
                </div>
                <div class="card-text">
                    <span class="date">publié le {{ $post->created_at->format('d/m/Y à H:i:s') }}</span>
                    <h2>{{ $post->groupe }}</h2>
                    <p>{!! $post->very_short_description !!}</p>
                </div>
                <div class="card-stats">
                    <div class="stat">
                        <!-- <p>Lire la suite</p> -->
                        <!-- <div class="value">4<sup>m</sup></div>
                        <div class="type">Lire</div>
                    </div>
                    <div class="stat border">
                        <div class="value">5123</div>
                        <div class="type">views</div>
                    </div>
                    <div class="stat">
                        <div class="value">32</div>
                        <div class="type">comments</div> -->
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div style="display:flex; justify-content:center; margin-top:50px;">
        {{ $posts->links() }}
    </div>
<div>

<!-- <div class='container-fluid'>
    <div class="row grid gap-4">
    @foreach($posts as $post)
        <div class="col-md-4 col-xs-4 col-sm-4 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <div class="pull-left">
                        <h4 class="grid-title">{{ $post->groupe }}</h4>
                    </div>
                    <a href="{{ route('groupe', $post->id) }}"><img src="{{ asset('storage/images/'.$post->image) }}" class="card-img-top" /></a>
                </div>
                <div class="card-body">
                    <h5 class="card-subtitle mb-2 text-muted">{{ $post->titre }}</h5>
                    <p class="card-text">{!! $post->short_description !!}</p>
                </div>
                <div class="card-footer">
                    <button onclick="location.href='{{ route('groupe', $post->id) }}'" class="btn btn-primary">Lire plus</button>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    {{ $posts->links() }}
</div> -->
@endsection


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
