@extends('layout')

@section('content')
    <div class="jumbotron">
        <h1>Create</h1>

        <div class="row" id="pjax-container-disabled">
            @include('errors')
            <form method="post" action="/flyers" type="multipart/form-data" data-pjax="true">
                @include('flyers.form')
            </form>
        </div>
    </div>
@stop

@section('scripts.footer')
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
Service

@stop