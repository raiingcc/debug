@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">签名生成</div>

                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                {{--<strong>生成失败</strong> 输入不符合要求<br><br>--}}
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <form action="{{ url('debug') }}" method="POST">
                            {!! csrf_field() !!}
                            {{--<input type="text" name="title" class="form-control" required="required" placeholder="密匙">--}}
                            {{--<br>--}}
                            <textarea name="body" rows="13" class="form-control" required="required" placeholder="请输入参数">{{ $body or '' }}</textarea>
                            <br>
                            <button class="btn btn-lg btn-success">生成签名</button>
                            {{--<button class="btn btn-lg btn-success col-xs-12">发起请求</button>--}}
                            {{--<br>--}}
                        </form>
                        <br>
                        <input type="text" class="form-control" required="required" placeholder="签名" value="{{ $signature or '' }}" />
                        <br>
                        <textarea rows="13" class="form-control" placeholder="生成签名后的参数">{{ $raw or '' }}</textarea>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection