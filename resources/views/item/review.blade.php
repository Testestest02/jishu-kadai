@extends('adminlte::page')

@section('title', 'レビュー投稿')

@section('content_header')
    <!-- レビュー追加パネル -->
    <h1>レビュー投稿</h1>
@stop

@section('content')
    <!-- エラーメッセージ -->
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <!-- 商品レビュー投稿フォーム -->
                <form method="POST" action="{{ url('items/post',  ['id'=>$item->id]) }}" id="post">
                    @csrf
                    <div class="card-header">
                        <div class="card-tital"><h3>{{ $item->name }}のレビュー</h3></div>
                    </div>
                    <div class="card-body">
                        <!-- ニックネーム -->
                        <div class="form-group">
                            <label for="name">ニックネーム <span class="small bg-danger text-white">必須</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="こちらにニックネームを入力して下さい。" value="{{ old('name') }}">
                        </div>
                        <!-- 商品評価 -->
                        <div class="form-group">
                            <label for="scroe">評価 <span class="small bg-danger text-white">必須</span></label>
                            <select name="score" id="score-select">♥
                                <option value="">評価数を選択してください</option>
                                <option value="♡ ♡ ♡ ♡ ♡" {{ old('score') === '♡ ♡ ♡ ♡ ♡' ? 'selected' : ''}}>♡ ♡ ♡ ♡ ♡ よくなかった</option>
                                <option value="♥ ♡ ♡ ♡ ♡" {{ old('score') === '♥ ♡ ♡ ♡ ♡' ? 'selected' : ''}}>♥ ♡ ♡ ♡ ♡ そんなに</option>
                                <option value="♥ ♥ ♡ ♡ ♡" {{ old('score') === '♥ ♥ ♡ ♡ ♡' ? 'selected' : ''}}>♥ ♥ ♡ ♡ ♡ まぁまぁ</option>
                                <option value="♥ ♥ ♥ ♡ ♡" {{ old('score') === '♥ ♥ ♥ ♡ ♡' ? 'selected' : ''}}>♥ ♥ ♥ ♡ ♡ 普通</option>
                                <option value="♥ ♥ ♥ ♥ ♡" {{ old('score') === '♥ ♥ ♥ ♥ ♡' ? 'selected' : ''}}>♥ ♥ ♥ ♥ ♡ 良かった</option>
                                <option value="♥ ♥ ♥ ♥ ♥" {{ old('score') === '♥ ♥ ♥ ♥ ♥' ? 'selected' : ''}}>♥ ♥ ♥ ♥ ♥ 満足</option> 
                            </select>
                        </div>
                        <!-- コメント -->
                        <div class="form-group">
                            <label for="comment">コメント <span class="small bg-danger text-white">必須</span></label>
                            <textarea class="form-control" id="comment" name="comment" placeholder="こちらにコメントを入力して下さい。" wrap="hard">{{ old('comment') }}</textarea>
                        </div>
                    </div>
                </form>
                    <!-- ボタングループ -->
                    <div class="card-footer">
                        <!-- レビュー投稿ボタン -->
                        <button type="submit" class="btn btn-primary mr-3" id="edit-item-{{ $item->id }}" form="post">
                        投稿する</button>
                        <!-- 戻るボタン -->
                        <button type="submit" class="btn btn-primary" onclick="location.href='/items/'">
                        戻る</button>
                    </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
