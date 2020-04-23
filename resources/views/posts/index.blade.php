@extends('default')

@section('content')
    @foreach($posts as $post)
        <h1>{{ $post->title }}</h1>
        @if($post->category)
            <p><em>{{ $post->category->name }}</em></p>
        @endif
        <p>{{ $post->content }}</p>
        @auth
        <a class="btn btn-primary" href="{{ route('posts.edit', $post) }}">Editer</a>
        @endauth
        <a class="btn btn-primary" href="{{ route('posts.show', $post) }}">Lire</a>
    @endforeach
@stop