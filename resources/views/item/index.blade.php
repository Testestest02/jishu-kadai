@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <!-- 商品一覧パネル -->
    <div class="d-flex mt-2">
        <h2>商品ラインナップ</h2>
        @can('isAdmin')
        <a href="{{ url('items/add') }}" class="ml-auto"><button type="submit" class="btn btn-secondary">
        商品登録</button></a>
        @endcan
    </div>
    @stop

    @section('content')
    <div class="p-4">
        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <h3 class="card-header text-center">アウタータイプ</h3>
                    <div class="row m-4">
                    @foreach ($items as $item)
                        <!-- 商品一覧表示（アウター）-->
                        @if ($item->type == 'アウター')
                        <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0 p-4">
                            <div class="card text-center">
                            <!-- 商品名（アウター）-->
                            <div class="card-header h4 bg-primary" style="letter-spacing: 0.42rem;">
                            {!! nl2br(htmlspecialchars($item->name)) !!}</div>
                                <div class="card-body">
                                    <!-- 商品非公開の場合のみ表示（インナー）-->
                                    @if ($item->status == 'passive')
                                    <div class="card-tool h2">
                                        <span class="badge badge-pill badge-secondary">非公開商品</span>
                                    </div>
                                    @endif
                                    @foreach ($item->points as $point)
                                    @if ($loop->last)
                                    <!-- 商品特長数（アウター）-->
                                    <div class="card-tool h3">
                                        <span class="badge badge-pill bg-warning">{{$loop->count}}つの特長！！</span>
                                    </div>
                                    @endif
                                    @endforeach
                                    <!-- 商品吸水量数（アウター）-->
                                    <div class="card-tool h3">
                                        <span class="badge badge-pill bg-info">{{ $item->max }}</span>
                                    </div>
                                    <!-- 商品対象性別（アウター）-->
                                    <div class="card-tool h3">
                                        <span class="badge badge-pill bg-danger">{{ $item->sex }}</span>
                                    </div>
                                    </div>
                                    <!-- ボタングループ-->
                                    <div class="card-footer">
                                    <!-- 商品詳細ボタン-->
                                    <a href="{{ route('items.detail',$item->id) }}">
                                    <button type="submit" id="detail-user-{{ $item->id }}" class="btn btn-primary mr-3">
                                    詳細</button></a>
                                <!-- アカウント権限が管理者であれば商品編集ボタンを表示（アウター）-->
                                @can('isAdmin')
                                    <!-- 商品編集ボタン-->
                                    <a href="{{ url('items/edit', ['id'=>$item->id]) }}">
                                    <button type="submit" id="edit-user-{{ $item->id }}" class="btn btn-secondary">
                                    編集</button></a>
                                @endcan
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach 
                    </div> 
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <h3 class="card-header text-center">インナータイプ</h3>
                    <div class="row m-4">
                    @foreach ($items as $item)
                        <!-- 商品一覧表示（インナー）-->
                        @if ($item->type == 'インナー')
                        <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0 p-4">
                            <div class="card text-center">
                                <!-- 商品名（インナー）-->
                                <div class="card-header h4 bg-primary" style="letter-spacing: 0.42rem;">
                                {!! nl2br(htmlspecialchars($item->name)) !!}</div>
                                <div class="card-body">
                                    <!-- 商品非公開の場合のみ表示（インナー）-->
                                    @if ($item->status == 'passive')
                                    <div class="card-tool h2">
                                        <span class="badge badge-pill badge-secondary">非公開商品</span>
                                    </div>
                                    @endif
                                    @foreach ($item->points as $point)
                                    @if ($loop->last)
                                    <!-- 商品特長数（インナー）-->
                                    <div class="card-tool h3">
                                        <span class="badge badge-pill badge-warning">{{$loop->count}}つの特長！！</span>
                                    </div>
                                    @endif
                                    @endforeach
                                    <!-- 商品吸水量数（インナー）-->
                                    <div class="card-tool h3">
                                        <span class="badge badge-pill bg-info">{{ $item->max }}</span>
                                    </div>
                                    <!-- 商品対象性別（インナー）-->
                                    <div class="card-tool h3">
                                        <span class="badge badge-pill bg-danger">{{ $item->sex }}</span>
                                    </div>
                                </div>
                                <!-- ボタングループ-->
                                <div class="card-footer">
                                    <!-- 商品詳細ボタン-->
                                    <a href="{{ route('items.detail',$item->id) }}">
                                    <button type="submit" id="detail-user-{{ $item->id }}" class="btn btn-primary mr-3">
                                    詳細</button></a>
                                <!-- アカウント権限が管理者であれば商品編集ボタンを表示（インナー）-->
                                @can('isAdmin')
                                    <!-- 商品編集ボタン-->
                                    <a href="{{ url('items/edit', ['id'=>$item->id]) }}">
                                    <button type="submit" id="edit-user-{{ $item->id }}" class="btn btn-secondary">
                                    編集</button></a>
                                @endcan
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach 
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
