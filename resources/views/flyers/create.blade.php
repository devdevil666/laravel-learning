@extends('layout')

@section('content')
    <div class="jumbotron">
        <h1>Create</h1>

        <div class="row" id="pjax-container-disabled">
            @include('errors')
            <form id="my-form" method="post" action="/flyers" type="multipart/form-data" data-pjax="true">
                @include('flyers.form')
            </form>
        </div>
    </div>
@stop

@section('scripts.footer')
    <!-- Laravel Javascript Validation -->
     <script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\FlyerRequest', '#my-form') !!}

@stop