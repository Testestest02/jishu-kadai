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

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'addIn']);
    Route::get('/detail/{id}', [App\Http\Controllers\ItemController::class, 'detail'])->name('items.detail');
    Route::get('/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit']);
    Route::post('/update/{id}', [App\Http\Controllers\ItemController::class, 'update']);
    Route::get('/review/{id}', [App\Http\Controllers\ItemController::class, 'review']);
    Route::post('/post/{id}', [App\Http\Controllers\ItemController::class, 'post']);
    Route::get('/reviewEdit/{id}/', [App\Http\Controllers\ItemController::class, 'reviewEdit']);
    Route::post('/reviewUpdate/{id}', [App\Http\Controllers\ItemController::class, 'reviewUpdate']);
    Route::delete('/destroy/{id}', [App\Http\Controllers\ItemController::class, 'destroy']);
    Route::delete('/destroyReview/{id}', [App\Http\Controllers\ItemController::class, 'destroyReview']);
});

Route::group(['middleware' => ['auth','can:isAdmin']], function () {
    //アカウント一覧表示
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    //アカウント編集画面へ遷移
    Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    //アカウント編集実行
    Route::post('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    //アカウント削除実行
    Route::delete('/user/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
});

Route::group(['middleware' => ['auth','can:isAdmin']], function () {
    //商品特長一覧表示
    Route::get('/point', [App\Http\Controllers\PointController::class, 'index'])->name('point.index');
    //商品特長追加画面表示
    Route::get('/point/add', [App\Http\Controllers\PointController::class, 'add'])->name('point.add');
    //商品特長追加実行
    Route::post('/point/add', [App\Http\Controllers\PointController::class, 'addIn'])->name('point.addIn');
    //商品特長編集画面へ遷移
    Route::get('/point/edit/{id}', [App\Http\Controllers\PointController::class, 'edit'])->name('point.edit');
    //商品特長編集実行
    Route::post('/point/update/{id}', [App\Http\Controllers\PointController::class, 'update'])->name('point.update');
    //商品特長削除実行
    Route::delete('/point/destroy/{id}', [App\Http\Controllers\PointController::class, 'destroy'])->name('point.destroy');
});

