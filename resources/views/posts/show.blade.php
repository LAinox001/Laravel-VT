@extends('default')

@section('content')
    <h1>{{ $post->title }}</h1>
    @if($post->category)
        <p><em>{{ $post->category->name }}</em></p>
    @endif
    <br>
    <p>{{ $post->content }}</p>
@endsection