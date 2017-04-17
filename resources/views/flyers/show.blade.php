@extends('layout')

@section('content')
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-3">
                <h1>{{ $flyer->street }}</h1>
                <h2>{!! $flyer->price !!}</h2>

                <div class="description">
                    {!! nl2br($flyer->description) !!}
                </div>
            </div>
            <div class="col-md-9">
                @foreach($flyer->photos as $photo)
                    <img src="{!! \Illuminate\Support\Facades\Storage::url($photo->path) !!}" alt="">
                @endforeach
            </div>
        </div>

        <hr>


        <form action="/{{ $flyer->zip }}/{{ $flyer->street }}/photos" class="dropzone" method="post">
            {{ csrf_field() }}
        </form>
    </div>
@stop