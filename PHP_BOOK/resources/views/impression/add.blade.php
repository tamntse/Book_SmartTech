@extends('layouts.default')

@section('title', '感想の登録')
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
    <div class="row" style="padding : 10px; margin: 10px;border-bottom : 1px solid black;"><h2>感想の登録</h2></div>
    <br>
    <div class="row">
        <div class="col-md-8">
            {{ csrf_field() }}
            <form class="form-horizontal" action="/cms/impression/update" method="post">
                <fieldset>
                <div class="form-group" style="display : none;">
                <label class="col-md-4 control-label" for="textinput">書籍名</label>  
                <div class="col-md-4">
                <input id="impressionId" name="impressionId" value="0"placeholder="" class="form-control input-md" type="text">
                <input id="bookId" name="bookId" value="{{ $bookId }}"placeholder="" class="form-control input-md" type="text">
                </div>
                </div>
                <!-- Password input-->
                <div class="form-group">
                <label class="col-md-4 control-label" for="passwordinput">コメント</label>
                <div class="col-md-4">
                     <textarea style=" width : 300px; height : 200px;" class="form-control" id="name" name="name" required></textarea>
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
    </div>
    <div class="row">
        <a class="btn btn-small btn-default" href="{{ URL::to('/cms/impression/' .$bookId) }}">戻る</a>
    </div>
@endsection