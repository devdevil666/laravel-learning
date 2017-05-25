@extends('layout')

@section('content')
    <div class="jumbotron">
        <table>

        <ul>
        @foreach($projects as $project)
            <li>{{ $project }}</li>
        @endforeach
        </ul>
        </table>
    </div>
@stop