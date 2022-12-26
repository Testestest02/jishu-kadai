@extends('adminlte::page')

@section('title', 'アカウント一覧')

@section('content_header')
    <!--アカウント一覧パネル -->
    <h2 class="mt-2">アカウント一覧</h2>
@stop

@section('content')
    <div class="p-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <!-- アカウントテーブルヘッダ -->
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>名前</th>
                                    <th>メールアドレス</th>
                                    <th>アカウント権限</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <!-- アカウントテーブル本体 -->
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <!-- ID -->
                                        <td>{{ $user->id }}</td>
                                        <!-- アカウント名 -->
                                        <td>{{ $user->name }}</td>
                                        <!-- Eメールアドレス -->
                                        <td>{{ $user->email }}</td>
                                        <!-- 権限 -->
                                        <td>@if ($user->role === 2 )上級管理者
                                            @elseif ($user->role === 1 )商品管理者
                                            @else利用者
                                            @endif
                                        </td>
                                        <!-- 編集ボタン -->
                                        <td class="text-center">
                                        <a href="{{ route('user.edit', $user->id) }}">
                                        <button type="submit" id="edit-user-{{ $user->id }}" class="btn btn-secondary ">
                                        編集</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- ページネーション -->
                <div class="d-flex justify-content-center">{{ $users->links('pagination::bootstrap-4')}}</div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
