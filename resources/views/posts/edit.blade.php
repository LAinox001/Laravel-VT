@extends('default')

@include('flash')

@section('content')
    <h1>Editer</h1>
    <div class="container">
        {!! form($form) !!}    
    </div>
@stop