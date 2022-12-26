@extends('adminlte::page')

@section('title', 'アカウント編集')

@section('content_header')
    <!--アカウント編集パネル -->
    <h1>アカウント編集</h1>
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
                <!-- アカウント編集フォーム -->
                <form method="POST" action="{{ route('user.update', $user->id) }}" id="update">
                    @csrf
                    <div class="card-body">
                        <!-- 名前 -->
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" value="{{ old('name', $user->name) }}" id="name" name="name">
                        </div>
                        <!-- Eメールアドレス -->
                        <div class="form-group">
                            <label for="email">メールアドレス</label>
                            <input type="text" class="form-control" value="{{ old('email', $user->email) }}" id="email" name="email">
                        </div>
                        <!-- 権限 -->
                        @can('isTopAdmin')
                        <div class="form-group">
                            <div class="form-group">
                                <label for="role">アカウント権限</label>
                            </div>
                            <div class="form-group form-check-inline">
                                <input type="radio" class="form-check-input" value="0" id="role0" name="role" {{ old('role', $user->role) == 0 ? 'checked' : ''}}>
                                <label for="role0" class="form-check-label">利用者</label>
                            </div>
                            <div class="form-group form-check-inline">
                                <input type="radio" class="form-check-input" value="1" id="role1" name="role" {{ old('role', $user->role) == 1 ? 'checked' : ''}}>
                                <label for="role1" class="form-check-label">商品管理者</label>
                            </div>
                            <div class="form-group form-check-inline">
                                <input type="radio" class="form-check-input" value="2" id="role2" name="role" {{ old('role', $user->role) == 2 ? 'checked' : ''}}>
                                <label for="role2" class="form-check-label">上級管理者</label>
                            </div>
                        </div>
                        @endcan
                    </div>
                </form>
                    <!-- ボタングループ -->
                    <div class="card-footer">
                        <!-- アカウント編集登録ボタン -->
                        <button type="submit" class="btn btn-primary mr-3" id="edit-user-{{ $user->id }}" form="update">
                            登録
                        </button>
                        <!-- 戻るボタン -->
                        <button type="submit" class="btn btn-success mr-3" onclick="location.href='/user/'">
                        戻る</button>
                        <!-- アカウント削除ボタン -->
                        <button type="submit" class="btn btn-danger" id="delete-user-{{ $user->id }}" form="delete" onclick='return confirm("「{{ $user->name }}様」のアカウントを削除してもよろしいですか");'>
                        アカウント削除
                        {{ method_field('DELETE') }}
                        </button>
                    </div>
                <!-- アカウント削除フォーム -->
                <form method="POST" action="{{ route('user.destroy', $user->id) }}" id="delete">
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
