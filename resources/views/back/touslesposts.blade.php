@extends('back.layout')

@section('content')

<table class="table table-bordered">
    <tr>
        <th>Groupe</th>
        <th>Pays</th>
        <th>Genre</th>
        <th>Article</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($posts as $post)
    {{-- {{ dd($posts)}} --}}
    <tr>
        <td>{{ $post->groupe }}</td>
        <td>{{ $post->pays }}</td>
        <td>{{ $post->genre }}</td>
        <td>{{ $post->article }}</td>
        <td></td>

    </tr>
    @endforeach
</table>
@endsection