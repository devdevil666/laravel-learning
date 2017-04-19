@extends('layout')

@section('content')
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-4">
                <h2>{{ $flyer->street }}</h2>
                <h3>{!! $flyer->price !!}</h3>

                <div class="description">
                    {!! nl2br($flyer->description) !!}
                </div>
            </div>
            <div class="col-md-8">
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