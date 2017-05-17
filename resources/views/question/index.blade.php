@extends('layouts.app')
@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                  @foreach($questions as $question)
                      <div class="panel panel-default">
                          <div class="panel-heading">
                            <a href="{{url('question',$question->id)}}"> {{$question->title}}</a>
                              @foreach($question->topics as $topic)
                              <a href=""><span>{{$topic->name}}</span></a>
                              @endforeach
                          </div>
                          {{str_limit(strip_tags($question->body),25)}}
                          <div>关注人数：{{$question->followers_count}}</div>
                      </div>
                @endforeach
                      {!! $questions->render() !!}
            </div>

        </div>

    </div>


    @include("layouts.CommonScript")
@endsection
