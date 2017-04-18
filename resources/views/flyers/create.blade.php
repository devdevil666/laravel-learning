@extends('layout')

@section('content')
    <div class="jumbotron">
        <h1>Create</h1>

        <div class="row" id="pjax-container">
            @include('errors')
            <form method="post" action="/flyers" type="multipart/form-data" data-pjax="true">
                @include('flyers.form')
            </form>
        </div>
    </div>
@stop