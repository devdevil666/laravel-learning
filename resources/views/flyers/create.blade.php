@extends('layout')

@section('content')
    <div class="jumbotron">
        <h1>Create</h1>

        <form method="post" action="/flyers" type="multipart/form-data">

            @include('flyers.form')
        </form>
    </div>
@stop