@extends('layouts.app')
@section('content')
    <nav class="breadcrumb"><i class="Hui-iconfont"></i> <a href="/" class="maincolor">首页</a>
        <span class="c-999 en">&gt;</span>
        <span class="c-666">我的日志列表</span>
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="Hui-article">
        <article class="cl pd-20">
        <table class="table table-border table-bordered table-bg">
            <thead>
            <tr>
                <th colspan="7" scope="col">信息统计</th>
            </tr>
            <tr class="text-c">
                <th>id</th>
                <th>title</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
            <tr class="text-c">
                <td>{{$item->id}}</td>
                <td>{{$item->title}}</td>
            </tr>
             @endforeach
            </tbody>
        </table>
            <div id="pull_right">
                <div class="pull-right">
                    {{ $items->links() }}
                </div>
            </div>

        </article>
    </div>
@endsection