@extends('adminlte::page')

@section('title', '特長登録')

@section('content_header')
    <!-- 商品特長追加パネル -->
    <h1>特長登録</h1>
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
                <!-- 特長追加フォーム -->
                <form method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                            <!-- 特長名 -->
                            <label for="name">特長名</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                            <!-- 特長詳細 -->
                            <label for="point">特長詳細</label>
                                <textarea class="form-control" id="detail" name="detailA" placeholder="ポイント１" wrap="hard">{{ old('detailA') }}</textarea>
                                <textarea class="form-control" id="detail" name="detailB" placeholder="ポイント２" wrap="hard">{{ old('detailB') }}</textarea>
                                <textarea class="form-control" id="detail" name="detailC" placeholder="ポイント３" wrap="hard">{{ old('detailC') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <!-- 特長追加ボタン -->
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
