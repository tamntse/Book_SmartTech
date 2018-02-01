@extends('layouts.default')

@section('title', '書籍一覧')
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="#">SmartTech Ventures</a>
        </div>
        <ul class="nav navbar-nav">
        <li class="active"><a href="/cms/book">書籍</a></li>
        </ul>
    </div>
</nav>
@section('content')
    <div class="row" style="padding : 10px; margin: 10px;border-bottom : 1px solid black;"><h2>書籍一覧</h2></div>
    <br>  
    <a class="btn btn-small btn-default" href="{{ URL::to('/cms/book/add') }}">追加</a>
    <div class="row"></div>
    <br>          
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>書籍名</th>
            <th>出版社名</th>
            <th>ページ数</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
            @foreach($books as $key => $value)
                <tr>

                    <td>{{ $key+1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->publisher }}</td>
                    <td>{{ $value->page }}</td>
                    <td>
                        <a class="btn btn-small btn-default" href="{{ URL::to('/cms/book/add/' . $value->id) }}">修正</a>
                        <a class="btn btn-small btn-default" href="{{ URL::to('/cms/book/delete/' . $value->id) }}">削除</a>
                        <a class="btn btn-small btn-primary" href="{{ URL::to('/cms/impression/' . $value->id) }}">感想の一覧</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $books->links() }}
@endsection