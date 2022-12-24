@extends('adminlte::page')

@section('title', '商品紹介')

@section('content_header')
    <!-- 商品詳細パネル -->
    <h1>商品紹介</h1>
@stop

@section('content')
    <!-- エラーメッセージ -->
    <div class="p-4">
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

                <div class="card">
                    <!-- 商品名 -->
                    <div class="card-header bg-primary" style="letter-spacing: 0.42rem;">
                        <div class="card-tital mt-3 text-center h1">{{ $item->name }}</div>
                    </div>
                    <!-- 商品詳細 -->
                    <div class="card-tool text-center p-1 h2">
                        <span class="badge badge-pill bg-secondary mx-2">{{ $item->type }}</span>
                        <span class="badge badge-pill bg-danger mx-2">{{ $item->sex }}</span>
                        <span class="badge badge-pill bg-info mx-2">{{ $item->max }}</span>
                    </div>
                    <div class="card-body mx-3 my-3">
                        <!-- 商品特長一覧 -->
                        <div class="form-group mb-4">
                            @foreach ($item->points as $point)
                            <div class="card-tool p-1 h2">
                                <small class="text-muted">特長{{$loop->iteration}}</small><span class="badge badge-warning text-dark ml-2">{{$point->name}}</span>
                            </div>
                            <div class="card-text p-3 mx-4 h5 mb-5">
                            <!-- 商品詳細 -->
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-warning">{!! nl2br(htmlspecialchars($point->detailA)) !!}</li>
                                @isset ($point->detailB)
                                <li class="list-group-item list-group-item-warning ">{!! nl2br(htmlspecialchars($point->detailB)) !!}</li>
                                @endisset
                                @isset ($point->detailC)
                                <li class="list-group-item list-group-item-warning">{!! nl2br(htmlspecialchars($point->detailC)) !!}</li>
                                @endisset
                            </ul>
                            </div>
                            @endforeach
                        </div>
                        <!-- 商品サイズ一覧テーブル -->
                        <div class="form-group">
                        <label class="h5 mb-3">仕様</label>
                            <table class="table table-bordered mb-4 mx-1 ml-2" style="max-width: 48rem;">
                                <thead>
                                    <tr>
                                        <th>サイズ</th>
                                        <th>枚数</th>
                                        <th>詳細</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($item->sizes as $size)
                                <tr>
                                    <td>{{$size->name}}サイズ</td>
                                    <td>{{$size->sheet}}枚入り</td>
                                    <td>{{$size->in}}cm～{{$size->out}}cm（ヒップサイズ）</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- 商品レビュー一覧 -->
                        <div class="form-group p-2">
                        <label class="h5">この商品についてのレビュー</label>
                        @foreach ($item->reviews as $review)
                            <!-- 商品にレビューがついていれば、そのレビューを表示 -->
                            @if ($review->item_id == $item->id)
                            <div class="card ml-3 mt-2" style="max-width: 32rem;">
                                <div class="card-body">
                                    <!-- ニックネーム 投稿日 -->
                                    <div class="card-tital d-flex">
                                        <h6>{{$review->name}}</h6>
                                        <h6 class="ml-auto">{{date('Y/m/d', strtotime($review->created_at))}}</h6>
                                    </div>
                                    <!-- 商品評価 -->
                                    <h4 class="card-text text-danger h3">{{$review->score}}</h4>
                                    <!-- コメント -->
                                    <p class="card-text">{!! nl2br(htmlspecialchars($review->comment)) !!}</p>
                                    <!-- コメントに返信があれば、返信を表示 -->
                                    @isset ($review->reply)
                                    <!-- 返信 更新日 -->
                                    <div class="card-text bg-light p-3 mb-2">
                                        <p>{!! nl2br(htmlspecialchars($review->reply)) !!}</p>
                                        <p class="text-right">{{ date('Y/m/d', strtotime($review->updated_at)) }}</p>
                                    </div>
                                    @endisset
                                    <!-- ログインしているのがレビューを投稿したユーザー、もしくは管理者の場合レビュー編集ボタンを表示 -->
                                    @if ($review->user_id == Auth::id() || $user->role == 2)
                                    <!-- レビュー削除フォーム -->
                                    <form method="POST" action="{{ url('items/destroyReview', ['id'=>$review->id]) }}" id="review">
                                    {{ csrf_field()}}
                                    {{ method_field('DELETE') }}
                                        <!-- レビュー編集ボタン -->
                                        <a href="{{ url('items/reviewEdit', ['id'=>$review->id]) }}" class="btn btn-primary">編集する</a>
                                        <!-- レビュー削除ボタン -->
                                        <input type="submit" class="btn btn-primary" name="reviewdestroy" id="{{ $review->id }}" value="削除する" form="review" onclick='return confirm("本当にレビューを削除してもよろしいですか");'></input>
                                    </form>
                                    @endif
                                </div>
                            </div>
                            @endif
                        @endforeach
                            <!-- 商品にレビューがついていなければ表示 -->
                            @if($item->reviews->isEmpty())
                            <p>現在この商品のレビューはありません</p>
                            @endif
                        </div>
                    </div>
                    <!-- ボタングループ -->
                    <div class="card-footer">
                        <!-- レビュー投稿ボタン -->
                        <a href="{{ url('items/review', ['id'=>$item->id]) }}">
                        <button type="submit" class="btn btn-primary" id="edit-item-{{ $item->id }}">
                        レビューする</button></a>
                        <!-- 戻るボタン -->
                        <button type="submit" class="btn btn-primary" onclick="location.href='/items/'">
                        戻る</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
