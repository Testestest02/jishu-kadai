@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')
    <!-- 商品編集パネル -->
    <h1>商品編集</h1>
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
                <!-- 商品更新フォーム -->
                <form method="POST" action="{{ url('items/update',  ['id'=>$item->id]) }}" id="update">
                @csrf
                <div class="card-body mx-3 my-3">
                    <!-- 商品名 -->
                    <div class="form-group mb-4">
                        <label class="h5" for="name">商品名</label><span class="h5 bg-danger text-white ml-1">必須</span>
                        <textarea class="form-control ml-3" id="name" name="name" wrap="hard">{{ old('name', $item->name) }}</textarea>
                    </div>
                    <!-- 商品種別 -->
                    <div class="form-group mb-4">
                        <div class="form-group">
                        <label class="h5" for="name">商品種別</label><span class="h5 bg-danger text-white ml-1">必須</span>
                        </div>
                        <div class="form-group form-check-inline ml-3">
                            <input type="radio" class="form-check-input" value="アウター" id="type0" name="type" {{ old('type', $item->type) == 'アウター' ? 'checked' : ''}}>
                            <label for="type0" class="form-check-label">アウター</label>
                            <input type="radio" class="form-check-input ml-3" value="インナー" id="type2" name="type" {{ old('type', $item->type) == 'インナー' ? 'checked' : ''}}>
                            <label for="type2" class="form-check-label">インナー</label>
                        </div>
                    </div>
                    <!-- 商品公開状況 -->
                    <div class="form-group mb-5">
                        <div class="form-group">
                        <label class="h5" for="status">商品公開状況</label><span class="h5 bg-danger text-white ml-1">必須</span>
                        </div>
                        <div class="form-group form-check-inline ml-3">
                            <input type="radio" class="form-check-input" value="active" id="active" name="status" {{ old('status', $item->status) == 'active' ? 'checked' : ''}}>
                            <label for="active" class="form-check-label">公開</label>
                            <input type="radio" class="form-check-input ml-3" value="passive" id="passive" name="status" {{ old('status', $item->status) == 'passive' ? 'checked' : ''}}>
                            <label for="passive" class="form-check-label">非公開</label>
                        </div>
                        <p class="text-success ml-3 mt-0">※非公開にすると、アカウント権限が利用者の場合、商品が表示されません。</p>
                    </div>
                    <!-- 商品対象性別 -->
                    <div class="form-group mb-4">
                        <div class="form-group">
                        <label class="h5" for="name">対応性別</label><span class="h5 bg-danger text-white ml-1">必須</span>
                        </div>
                        <div class="form-group form-check-inline ml-3">
                            <input type="radio" class="form-check-input" value="男女兼用" id="sex0" name="sex" {{ old('sex', $item->sex) == '男女兼用' ? 'checked' : ''}}>
                            <label for="sex0" class="form-check-label">男女兼用</label>
                            <input type="radio" class="form-check-input ml-3" value="男性用" id="sex1" name="sex" {{ old('sex', $item->sex) == '男性用' ? 'checked' : ''}}>
                            <label for="sex1" class="form-check-label">男性用</label>
                            <input type="radio" class="form-check-input ml-3" value="女性用" id="sex2" name="sex" {{ old('sex', $item->sex) == '女性用' ? 'checked' : ''}}>
                            <label for="sex2" class="form-check-label">女性用</label>
                        </div>
                    </div>
                    <!-- 商品特長名 -->
                    <div class="form-group mb-4">
                        <div class="form-group">
                        <label class="h5" for="name">特長選択</label><span class="h5 bg-danger text-white ml-1">必須</span>
                        </div>
                        @foreach ($points as $point)
                        <!-- 商品特長詳細 -->
                        <div class="form-group form-check-inline ml-3 mx-3 my-3">
                        <input type="checkbox" class="form-check-input" value="{{ $point->id }}" name="points[]" {{ $item->points->contains($point->id) ? 'checked' : '' }}>
                            <label for="point" class="form-check-label">{{ $point->name }}</label>
                        </div>
                        <p class="card-text mx-5">{!! nl2br(htmlspecialchars($point->detailA)) !!}</p>
                        @isset ($point->detailB)
                        <p class="card-text mx-5">{!! nl2br(htmlspecialchars($point->detailB)) !!}</p>
                        @endisset
                        @isset ($point->detailC)
                        <p class="card-text mx-5">{!! nl2br(htmlspecialchars($point->detailC)) !!}</p>
                        @endisset
                        @endforeach
                    </div>
                    <!-- 商品吸水量 -->
                    <div class="form-group mb-4">
                        <div class="form-group">
                        <label class="h5" for="name">吸水量</label><span class="h5 bg-danger text-white ml-1">必須</span>
                        </div>
                        <div class="form-group form-check-inline ml-3">
                        <input type="radio" class="form-check-input" value="おしっこ1回分" id="max1" name="max" {{ old('max', $item->max) == 'おしっこ1回分' ? 'checked' : ''}}>
                            <label for="max1" class="form-check-label">おしっこ1回分</label>
                            <input type="radio" class="form-check-input ml-3" value="おしっこ2回分" id="max2" name="max" {{ old('max', $item->max) == 'おしっこ2回分' ? 'checked' : ''}}>
                            <label for="max2" class="form-check-label">おしっこ2回分</label>
                            <input type="radio" class="form-check-input ml-3" value="おしっこ3回分" id="max3" name="max" {{ old('max', $item->max) == 'おしっこ3回分' ? 'checked' : ''}}>
                            <label for="max3" class="form-check-label">おしっこ3回分</label>
                            <input type="radio" class="form-check-input ml-3" value="おしっこ4回分" id="max4" name="max" {{ old('max', $item->max) == 'おしっこ4回分' ? 'checked' : ''}}>
                            <label for="max4" class="form-check-label">おしっこ4回分</label>
                            <input type="radio" class="form-check-input ml-3" value="おしっこ5回分" id="max5" name="max" {{ old('max', $item->max) == 'おしっこ5回分' ? 'checked' : ''}}>
                            <label for="max5" class="form-check-label">おしっこ5回分</label>
                        </div>
                    </div>
                    <!-- 商品サイズ -->
                    <div class="form-group mb-4">
                        <div class="form-group">
                        <label class="h5" for="name">サイズ選択</label><span class="h5 bg-danger text-white ml-1">必須</span>
                        </div>
                        @foreach ($sizes as $size)
                        <div class="form-group form-check-inline ml-3">
                        <input type="checkbox" class="form-check-input" value="{{ $size->id }}" name="sizes[]" {{ $item->sizes->contains($size->id) ? 'checked' : '' }}>
                            <label for="size" class="form-check-label">{{ $size->name }}サイズ</label>
                        </div>
                        <p class="card-text mx-5" style="white-space:pre-wrap;">  {{ $size->sheet }}枚入り　ウエストサイズ( {{ $size->in }}ｃｍ～{{ $size->out }}ｃｍ )</p>
                        @endforeach
                    </div>
                </div>
                </form>
                <!-- ボタングループ -->
                <div class="card-footer">
                    <!-- 商品登録ボタン -->
                    <button type="submit" class="btn btn-primary mr-3" id="edit-item-{{ $item->id }}" form="update">
                    商品登録</button>
                    <!-- 商品削除ボタン -->
                    <button type="submit" class="btn btn-danger mr-3" id="delete-item-{{ $item->id }}" form="delete" onclick='return confirm("「{{ $item->name }}」を削除してもよろしいですか");'>
                    商品削除</button>
                    <!-- 戻るボタン -->
                    <button type="submit" class="btn btn-success" onclick="location.href='/items/'">
                    戻る</button>
                </div>
                <!-- 商品削除フォーム -->
                <form method="POST" action="{{ url('items/destroy', ['id'=>$item->id]) }}" id="delete">
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
