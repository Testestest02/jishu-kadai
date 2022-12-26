@extends('adminlte::page')

@section('title', '商品特徴一覧')

@section('content_header')
    <!--商品特長一覧パネル -->
    <div class="d-flex mt-2">
        <h2>商品特長一覧</h2>
        @can('isAdmin')
        <a href="{{ route('point.add') }}" class="ml-auto"><button type="submit" class="btn btn-secondary ">
        特長登録</button></a>
        @endcan
    </div>
@stop

@section('content')
    <div class="p-4">
        <div class="row">
            @foreach ($points as $point)
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-warning d-flex">
                        <h2 class="ml-3" style="letter-spacing: 0.42rem;">{{ $point->name }}</h2>
                        <!-- 商品特長編集画面への遷移ボタン -->
                        @can('isAdmin')
                        <a href="{{ route('point.edit', $point->id) }}" class="ml-auto"><button type="submit" id="edit-{{ $point->id }}" class="btn btn-secondary ">
                        編集</button></a>
                        @endcan
                    </div>
                    <div class="card-body mb-3 mx-4">
                        <!-- 商品特長内容表示 -->
                        <ul class="list-group mt-4">
                            <li class="list-group-item list-group-item-warning"><p class="h5">ポイント１</p>
                            <p class="card-text ml-2 my-2 h5">{!! nl2br(htmlspecialchars($point->detailA)) !!}</p></li>
                            @isset ($point->detailB)
                            <li class="list-group-item list-group-item-warning"><p class="h5">ポイント２</p>
                            <p class="card-text ml-2 my-2 h5">{!! nl2br(htmlspecialchars($point->detailB)) !!}</p></li>
                            @endisset
                            @isset ($point->detailC)
                            <li class="list-group-item list-group-item-warning"><p class="h5">@if (isset($point->detailB)) ポイント３ @else ポイント２ @endif</p>
                            <p class="card-text ml-2 my-2 h5">{!! nl2br(htmlspecialchars($point->detailC)) !!}</p></li>
                            @endisset
                        </ul>
                        <!-- 商品特長を持つ商品一覧 -->
                        <label class="h5 mt-4">該当商品</label>
                        <div class="row">
                            <div class="card-tool text-center p-2 h4">
                            @foreach ($point->items as $item)
                            <a href="{{ route('items.detail',$item->id) }}" class="badge badge-pill bg-primary" style="letter-spacing: 0.42rem;">{{ $item->name }}</a>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
