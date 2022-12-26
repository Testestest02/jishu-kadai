@extends('adminlte::page')

@section('title', '商品特長編集')

@section('content_header')
    <!-- 商品特長編集パネル -->
    <h1>商品特長編集</h1>
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
                <!-- 商品特長更新フォーム -->
                <form method="POST" action="{{ route('point.update', $point->id) }}" id="update">
                    @csrf
                    <div class="card-body">
                        <!-- 商品特長名 -->
                        <div class="form-group">
                            <label for="name">特長名</label>
                            <input type="text" class="form-control" value="{{ old('name', $point->name) }}" id="name" name="name">
                        </div>
                        <!-- 商品特長詳細 -->
                        <div class="form-group">
                            <label for="point">特長詳細</label>
                            <textarea class="form-control" id="detail" name="detailA" placeholder="ポイント１" wrap="hard">{{ old('detailA', $point->detailA) }}</textarea>
                            <textarea class="form-control" id="detail" name="detailB" placeholder="ポイント２" wrap="hard">{{ old('detailA', $point->detailB) }}</textarea>
                            <textarea class="form-control" id="detail" name="detailC" placeholder="ポイント３" wrap="hard">{{ old('detailA', $point->detailC) }}</textarea>
                        </div>
                    </div>
                </form>
                    <!-- ボタングループ -->
                    <div class="card-footer">
                        <!-- 商品特長更新ボタン -->
                        <button type="submit" class="btn btn-primary mr-3" form="update">登録</button>
                        <!-- 戻るボタン -->
                        <button type="submit" class="btn btn-success mr-3" onclick="location.href='/point/'">
                        戻る</button>
                        <!-- 商品特長削除ボタン -->
                        <button type="submit" class="btn btn-danger" form="destroy" onclick='return confirm("「{{ $point->name }}」を削除してもよろしいですか");'>
                        商品特長削除</button>
                    </div>
                <!-- 商品特長削除フォーム -->
                <form action="{{ route('point.destroy', $point->id) }}" method="POST" id="destroy">
                {{ csrf_field()}}
                {{ method_field('DELETE') }}
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
