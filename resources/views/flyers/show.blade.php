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
                <div id="photos-container" class="row">
                    @foreach($flyer->photos as $photo)
                        <img class="thumbnail col-md-3" src="{!! \Illuminate\Support\Facades\Storage::url($photo->thumbnail_path, 'public') !!}" alt="">
                    @endforeach
                </div>
                <hr>
                <form id="addPhoto" action="{{ route('store_photo_path', [$flyer->zip, $flyer->street]) }}" class="dropzone" method="post">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@stop