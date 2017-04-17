@extends('layout')

@section('content')
    <div class="jumbotron">
        <h1>Create</h1>

        <div class="row">
            <form method="post" action="/flyers" type="multipart/form-data" class="col-md-6">
                @include('flyers.form')
            </form>

            @if(count($errors) > 0)
            <div class="col-md-6">
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

        </div>
    </div>
@stop