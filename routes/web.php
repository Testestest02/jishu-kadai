<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //商品管理
    Route::prefix('items')->group(function () {
    //商品一覧表示
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    //商品追加画面表示
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    //商品追加実行
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'addIn']);
    //商品詳細表示
    Route::get('/detail/{id}', [App\Http\Controllers\ItemController::class, 'detail'])->name('items.detail');
    //商品編集画面表示
    Route::get('/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit']);
    //商品更新実行
    Route::post('/update/{id}', [App\Http\Controllers\ItemController::class, 'update']);
    //商品レビュー画面遷移
    Route::get('/review/{id}', [App\Http\Controllers\ItemController::class, 'review']);
    //商品レビュー送信
    Route::post('/post/{id}', [App\Http\Controllers\ItemController::class, 'post']);
    //商品レビュー編集画面表示
    Route::get('/reviewEdit/{id}/', [App\Http\Controllers\ItemController::class, 'reviewEdit']);
    //商品レビュー更新実行
    Route::post('/reviewUpdate/{id}', [App\Http\Controllers\ItemController::class, 'reviewUpdate']);
    //商品削除実行
    Route::delete('/destroy/{id}', [App\Http\Controllers\ItemController::class, 'destroy']);
    //商品レビュー削除
    Route::delete('/destroyReview/{id}', [App\Http\Controllers\ItemController::class, 'destroyReview']);
    });

    //マイアカウント編集
    Route::get('/myAccount', [App\Http\Controllers\UserController::class, 'myaccount']);
    //アカウント一覧表示
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    //アカウント編集画面表示
    Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    //アカウント編集実行
    Route::post('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    //アカウント削除実行
    Route::delete('/user/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

    //商品特長一覧表示
    Route::get('/point', [App\Http\Controllers\PointController::class, 'index'])->name('point.index');
    Route::group(['middleware' => ['auth','can:isAdmin']], function () {
    //商品特長追加画面表示
    Route::get('/point/add', [App\Http\Controllers\PointController::class, 'add'])->name('point.add');
    //商品特長追加実行
    Route::post('/point/add', [App\Http\Controllers\PointController::class, 'addIn'])->name('point.addIn');
    //商品特長編集画面表示
    Route::get('/point/edit/{id}', [App\Http\Controllers\PointController::class, 'edit'])->name('point.edit');
    //商品特長更新実行
    Route::post('/point/update/{id}', [App\Http\Controllers\PointController::class, 'update'])->name('point.update');
    //商品特長削除実行
    Route::delete('/point/destroy/{id}', [App\Http\Controllers\PointController::class, 'destroy'])->name('point.destroy');
    });

