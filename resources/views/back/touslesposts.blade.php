@extends('back.layout')

@section('content')
<table class="table table-bordered">
    <tr>
        <th>Groupe</th>
        <th>Pays</th>
        <th>Genre</th>
        <th>Titre</th>
        <th style="width:200px">Article</th>
        <th>Image</th>
        <th style="width:100px">Clip</th>
        <th style="width:200px">Action</th>
    </tr>
    @foreach ($posts as $post)
        <tr>
            <td>{{ $post->groupe }}</td>
            <td>{{ $post->pays }}</td>
            <td>{{ $post->genre }}</td>
            <td>{{ $post->titre }}</td>
            <td>{!! $post->very_short_description !!}</td>
            <td><img style="width:100px; margin-bottom:5px" src="{{ asset('storage/images/'.$post->image) }}" /><br />
            @isset($post->couv)
                <img style="width:100px" src=" {{ asset('storage/images/couv/'.$post->couv) }}" />
                @endisset
            </td>
            <td><iframe src="{{ $post->clip }}"></iframe></td>
        <td>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
            <a class="btn btn-info" href="{{ route('posts.show', $post->id) }}">Voir</a>
            <a class="btn btn-primary" href="{{ route('posts.edit', $post->id) }}">Éditer</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $posts->links() }}
@endsection