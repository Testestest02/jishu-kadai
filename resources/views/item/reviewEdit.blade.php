@extends('adminlte::page')

@section('title', 'レビュー投稿')

@section('content_header')
    <!-- レビュー編集パネル -->
    <h1>レビュー編集</h1>
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
            <!-- 商品レビュー更新フォーム -->
            <form method="POST" action="{{ url('items/reviewUpdate',  ['id'=>$review->id]) }}" id="reviewUpdate">
                @csrf
                <div class="card-header">
                    <div class="card-tital"><h3>{{ $item->name }}のレビュー</h3></div>
                </div>
                <div class="card-body">
                    <!-- ニックネーム -->
                    <div class="form-group">
                        <label for="name">ニックネーム <span class="small bg-danger text-white">必須</span></label>
                        <input type="text" class="form-control" value="{{ old('name', $review->name) }}" id="name" name="name">
                    </div>
                    <!-- 商品評価 -->
                    <div class="form-group">
                        <label for="scroe">評価 <span class="small bg-danger text-white">必須</span></label>
                        <select name="score" id="score-select">
                            <option value="">評価数を選択してください</option>
                            <option value="♡ ♡ ♡ ♡ ♡" {{ old('score', $review->score) === '♡ ♡ ♡ ♡ ♡' ? 'selected' : ''}}>♡ ♡ ♡ ♡ ♡ よくなかった</option>
                            <option value="♥ ♡ ♡ ♡ ♡" {{ old('score', $review->score) === '♥ ♡ ♡ ♡ ♡' ? 'selected' : ''}}>♥ ♡ ♡ ♡ ♡ そんなに</option>
                            <option value="♥ ♥ ♡ ♡ ♡" {{ old('score', $review->score) === '♥ ♥ ♡ ♡ ♡' ? 'selected' : ''}}>♥ ♥ ♡ ♡ ♡ まぁまぁ</option>
                            <option value="♥ ♥ ♥ ♡ ♡" {{ old('score', $review->score) === '♥ ♥ ♥ ♡ ♡' ? 'selected' : ''}}>♥ ♥ ♥ ♡ ♡ 普通</option>
                            <option value="♥ ♥ ♥ ♥ ♡" {{ old('score', $review->score) === '♥ ♥ ♥ ♥ ♡' ? 'selected' : ''}}>♥ ♥ ♥ ♥ ♡ 良かった</option>
                            <option value="♥ ♥ ♥ ♥ ♥" {{ old('score', $review->score) === '♥ ♥ ♥ ♥ ♥' ? 'selected' : ''}}>♥ ♥ ♥ ♥ ♥ 満足</option> 
                        </select>
                    </div>
                    <!-- コメント -->
                    <div class="form-group">
                        <label for="comment">コメント <span class="small bg-danger text-white">必須</span></label>
                        <textarea class="form-control" id="comment" name="comment" wrap="hard">{{ old('comment', $review->comment) }}</textarea>
                    </div>
                    <!-- アカウント権限が管理者であれば表示 -->
                    @can('isAdmin')
                    <div class="form-group">
                        <!-- コメントに対しての返信 -->
                        <label for="reply">返信 <span class="small bg-danger text-white">必須</span></label>
                        <textarea class="form-control" id="reply" name="reply" wrap="hard">{{ old('reply', $review->reply) }}</textarea>
                    </div>
                    @endcan
                </div>
                </form>
                <!-- ボタングループ -->
                <div class="card-footer">
                    <!-- レビュー投稿ボタン -->
                    <button type="submit" class="btn btn-primary" id="update-review-{{ $review->id }}" form="reviewUpdate">
                    投稿する</button>
                    <!-- 戻るボタン -->
                    <button type="submit" class="btn btn-primary" onclick="location.href='/items/detail/{{ $item->id }}'">
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
