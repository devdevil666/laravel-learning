@extends('layout')

@section('content')
    <div class="jumbotron">
        <h1>{{ $flyer->street }}</h1>
        <h2>{!! $flyer->price !!}</h2>

        <hr>

        <div class="description">
            {!! nl2br($flyer->description) !!}
        </div>
    </div>
@stop