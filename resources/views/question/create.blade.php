@extends('layouts.app')
@section('css')
    <script src="https://cdn.bootcss.com/select2/4.0.3/js/select2.full.min.js"></script>
    <link href="https://cdn.bootcss.com/select2/4.0.3/css/select2.css" rel="stylesheet">
    @stop

@section('content')
    {!! we_css() !!}
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-heading">写新问题</div>
                    <form action="{{url('question')}}" method="post">
                    <div class="form-group">
                        <label>标题：</label>
                        <input type="text" value="{{old('title')}}" class="form-control" placeholder="标题" id="title" name="title"/>
                        {{$errors->has('title')?$errors->first('title'):''}}
                    </div>
                        <div class="form-group">
                            <textarea id="wangeditor" name="body" class="form-control" style="height: 400px">{{old('body')}}</textarea>
                            {{$errors->has('body')?$errors->first('body'):''}}
                            {!! we_js() !!}
                            {!! we_config('wangeditor') !!}
                        </div>
                        <div class="form-group">
                        <div class="form-group">
                            <select name="topic[]" id="topic" class="form-control" multiple></select>
                        </div>
                            <button class="btn btn-primary" type="submit">发布</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

        @include('layouts.CommonScript')
<script>

    $(document).ready(function () {
//        function newTopic(topic) {
//            console.warn("得到的数据：\n"+topic);
//        return topic.name||topic.text;
//
//    }
        $("#topic").select2(
            {    placeholder: "选择话题",
                minimumInputLength: 1,
                ajax:
                    {
                        url:'{{url('topic')}}',
                        dataType:'json',
                        data:function (param) {
                            return{
                                q:$.trim(param.term)
                            }
                        },
                        processResults:function (data) {

                            return{
                                results:data
                            }
                        }
                    },
                cache:true

            });
    });</script>
@endsection
