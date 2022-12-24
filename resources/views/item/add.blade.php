@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <!-- 商品追加編集パネル -->
    <h1>商品登録</h1>
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
                <!-- 商品追加フォーム -->
                <form method="POST" action="{{ url('items/add') }}" id="addIn">
                    @csrf
                    <div class="card-body mx-3 my-3">
                        <!-- 商品名 -->
                        <div class="form-group mb-4">
                            <label class="h5" for="name">商品名</label><span class="h5 bg-danger text-white ml-1">必須</span>
                            <input type="text" class="form-control ml-3" id="name" name="name" value="{{ old('name') }}">
                        </div>
                        <!-- 商品種別 -->
                        <div class="form-group mb-4">
                            <div class="form-group">
                            <label class="h5" for="name">商品種別</label><span class="h5 bg-danger text-white ml-1">必須</span>
                            </div>
                            <div class="form-group form-check-inline ml-3">
                                <input type="radio" class="form-check-input" value="アウター" id="type0" name="type" {{old('type') == 'アウター' ? 'checked' : ''}}>
                                <label for="type0" class="form-check-label">アウター</label>
                                <input type="radio" class="form-check-input ml-3" value="インナー" id="type2" name="type" {{old('type') == 'インナー' ? 'checked' : ''}}>
                                <label for="type2" class="form-check-label">インナー</label>
                            </div>
                        </div>
                        <!-- 商品公開状況 -->
                        <div class="form-group mb-4">
                            <div class="form-group">
                            <label class="h5" for="status">商品公開状況</label><span class="h5 bg-danger text-white ml-1">必須</span>
                            </div>
                            <div class="form-group form-check-inline ml-3">
                                <input type="radio" class="form-check-input" value="active" id="active" name="status" {{ old('status') == 'active' ? 'checked' : ''}}>
                                <label for="active" class="form-check-label">公開</label>
                                <input type="radio" class="form-check-input ml-3" value="passive" id="passive" name="status" {{ old('status') == 'passive' ? 'checked' : ''}}>
                                <label for="passive" class="form-check-label">非公開</label>
                            </div>
                        </div>
                        <!-- 商品対応性別 -->
                        <div class="form-group mb-4">
                            <div class="form-group">
                            <label class="h5" for="name">対応用性別</label><span class="h5 bg-danger text-white ml-1">必須</span>
                            </div>
                            <div class="form-group form-check-inline ml-3">
                                <input type="radio" class="form-check-input" value="男女兼用" id="sex0" name="sex" {{old('sex') == '男女兼用' ? 'checked' : ''}}>
                                <label for="sex0" class="form-check-label">男女兼用</label>
                                <input type="radio" class="form-check-input ml-3" value="男性用" id="sex1" name="sex" {{old('sex') == '男性用' ? 'checked' : ''}}>
                                <label for="sex1" class="form-check-label">男性用</label>
                                <input type="radio" class="form-check-input ml-3" value="女性用" id="sex2" name="sex" {{old('sex') == '女性用' ? 'checked' : ''}}>
                                <label for="sex2" class="form-check-label">女性用</label>
                            </div>
                        </div>
                        <!-- 商品特長一覧 -->
                        <div class="form-group mb-4">
                            <div class="form-group">
                            <label class="h5" for="name">特長選択</label><span class="h5 bg-danger text-white ml-1">必須</span>
                            </div>
                            @foreach ($points as $point)
                            <div class="form-group form-check-inline ml-3">
                                <input type="checkbox" class="form-check-input" value="{{ $point->id }}" name="points[]" {{ is_array(old("points")) && in_array("$point->id", old("points"), true)? ' checked' : '' }}>
                                <label for="point" class="form-check-label">{{ $point->name }}</label>
                            </div>
                            <p class="card-text mx-5">{{ $point->detailA }}</p>
                            @isset ($point->detailB)
                            <p class="card-text mx-5">{{ $point->detailB }}</p>
                            @endisset
                            @isset ($point->detailC)
                            <p class="card-text mx-5">{{ $point->detailC }}</p>
                            @endisset
                            @endforeach
                        </div>
                        <!-- 商品吸水量 -->
                        <div class="form-group mb-4">
                            <div class="form-group">
                            <label class="h5" for="name">吸水量</label><span class="h5 bg-danger text-white ml-1">必須</span>
                            </div>
                            <div class="form-group form-check-inline ml-3">
                                <input type="radio" class="form-check-input" value="おしっこ1回分" id="max1" name="max" {{old('max') == 'おしっこ1回分' ? 'checked' : ''}}>
                                <label for="max1" class="form-check-label">おしっこ1回分</label>
                                <input type="radio" class="form-check-input ml-3" value="おしっこ2回分" id="max2" name="max" {{old('max') == 'おしっこ2回分' ? 'checked' : ''}}>
                                <label for="max2" class="form-check-label">おしっこ2回分</label>
                                <input type="radio" class="form-check-input ml-3" value="おしっこ3回分" id="max3" name="max" {{old('max') == 'おしっこ3回分' ? 'checked' : ''}}>
                                <label for="max3" class="form-check-label">おしっこ3回分</label>
                                <input type="radio" class="form-check-input ml-3" value="おしっこ4回分" id="max4" name="max" {{old('max') == 'おしっこ4回分' ? 'checked' : ''}}>
                                <label for="max4" class="form-check-label">おしっこ4回分</label>
                                <input type="radio" class="form-check-input ml-3" value="おしっこ5回分" id="max5" name="max" {{old('max') == 'おしっこ5回分' ? 'checked' : ''}}>
                                <label for="max5" class="form-check-label">おしっこ5回分</label>
                            </div>
                        </div>
                        <!-- 商品サイズ一覧 -->
                        <div class="form-group mb-4">
                            <div class="form-group">
                            <label class="h5" for="name">サイズ選択</label><span class="h5 bg-danger text-white ml-1">必須</span>
                            </div>
                            @foreach ($sizes as $size)
                            <div class="form-group form-check-inline ml-3">
                                <input type="checkbox" class="form-check-input" value="{{ $size->id }}" name="sizes[]" {{ is_array(old("sizes")) && in_array("$size->id", old("sizes"), true)? ' checked' : '' }}>
                                <label for="size" class="form-check-label">{{ $size->name }}サイズ</label>
                            </div>
                            <p class="card-text mx-5" style="white-space:pre-wrap;">  {{ $size->sheet }}枚入り　ウエストサイズ( {{ $size->in }}ｃｍ～{{ $size->out }}ｃｍ )</p>
                            @endforeach
                        </div>
                    </div>
                    <!-- 商品追加登録ボタン -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" form="addIn">登録</button>
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
