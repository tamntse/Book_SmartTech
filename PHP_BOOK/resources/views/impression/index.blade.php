@extends('layouts.default')

@section('title', '感想一覧')
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="#">SmartTech Ventures</a>
        </div>
        <ul class="nav navbar-nav">
        <li class=""><a href="/cms/book">書籍</a></li>
        </ul>
    </div>
</nav>
@section('content')
<div class="row" style="padding : 10px; margin: 10px;border-bottom : 1px solid black;"><h2>感想一覧 {{ $bookName }}</h2></div>
<br>  
<a class="btn btn-small btn-default" href="{{ URL::to('/cms/impression/add/' .$id . '/0') }}">追加</a>
<div class="row"></div>
<br>
<div class="row">          
<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>コメント</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
        @foreach($impressions as $key => $value)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->name }}</td>
                <td>
                    <a class="btn btn-small btn-default" href="{{ URL::to('/cms/impression/add/' .$id . '/' . $value->id) }}">修正</a>
                    <a class="btn btn-small btn-default" href="{{ URL::to('/cms/impression/delete/' .$id . '/' . $value->id) }}">削除</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
{{ $impressions->links() }}
<div class="row">
    <a class="btn btn-small btn-default" href="{{ URL::to('/cms/book/') }}">戻る</a>
</div> 
@endsection