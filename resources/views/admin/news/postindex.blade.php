@extends('layouts.admin')
@section('title', '登録済みニュースの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>投稿一覧（拡張）</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\Postcontroller@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\Postcontroller@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ユーザー名</th>
                                <th width="15%">タイトル</th>
                                <th width="40%">本文</th>
                                <th width="10%">投稿日時</th>
                                <th width="5%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $news)
                                <tr>
                                    <th>{{ \Str::limit($news->name, 50)}}</th>
                                    <td>{{ \Str::limit($news->title, 100) }}</td>
                                    <td>{{ \Str::limit($news->body, 250) }}</td>
                                    <td>{{ \Str::limit($news->created_at, 50) }}</td>
                                    <td>
                                     <div>
                                            <a href="{{ action('Admin\Postcontroller@delete', ['id' => $news->id]) }}">削除</a>
                                     </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection