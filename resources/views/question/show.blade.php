@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$question->title}}</div>
                   {!! $question->body !!}
                    <div>关注人数：{{$question->followers_count}}</div>
                </div>

            </div>

        </div>
    </div>
@include("layouts.CommonScript")
@endsection
