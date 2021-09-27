@extends('layouts.menu')
@section('content')

<h1 style="display: flex; justify-content:center;" class="mb-4">Liste des articles pour le groupe {{ $groupe }}.</h1>

<div class='container-fluid'>
    <div class="row grid gap-4">
@foreach ($posts as $post)
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
</div>

@endsection

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>