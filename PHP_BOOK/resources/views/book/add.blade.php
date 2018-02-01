@extends('layouts.default')

@section('title', '書籍の編集')
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
    <div class="clear-fix"></div>
    <div class="row" style="padding : 10px; margin: 10px;border-bottom : 1px solid black;"><h2>書籍の編集</h2></div>
    <br>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
            {{ csrf_field() }}
            <form class="form-horizontal" action="/cms/book/add" method="post">
                <fieldset>
                <!-- Text input-->
                <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">書籍名</label>  
                <div class="col-md-4">
                <input id="name" name="name" placeholder="" class="form-control input-md" type="text" required>
                </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                <label class="col-md-4 control-label" for="passwordinput">出版社名</label>
                <div class="col-md-4">
                    <input id="publisher" name="publisher" placeholder="" class="form-control input-md" type="text" required>
                </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">ページ数</label>  
                <div class="col-md-4">
                <input id="page" name="page" placeholder="" class="form-control input-md" type="number" required>
                </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton"></label>
                <div class="col-md-4">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">送信</button>
                </div>
                </div>
                </fieldset>
                </form>
            </div>
            <div class="row">
                <a class="btn btn-small btn-default" href="{{ URL::to('/cms/book/') }}">戻る</a>
            </div>
        </div>
    </div>
@endsection