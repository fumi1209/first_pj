<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']) -> name('home');

//(商品一覧画面表示・検索)product/listにアクセスしたら、コントローラークラスの、指定メソッドを呼び出す。※Route::HTTP 動詞
Route::get('/product/list', [App\Http\Controllers\ProductController::class, 'index']) -> name('productList');

//(新規登録画面表示)
Route::get('/product/register', [App\Http\Controllers\ProductController::class, 'showCreate']) -> name('createRegister');

//(新規登録処理(DBへ保存))(データ送信はPOST exe=実行する)
Route::post('/product/register', [App\Http\Controllers\ProductController::class, 'exeStore']) -> name('storeRegister');

//（商品詳細画面表示）ルートでIDを受け取り、コントローラークラスの、指定メソッドにIDを渡す。
Route::get('/product/detail/{id}', [App\Http\Controllers\ProductController::class, 'showDetail']) -> name('showDetail');

//(編集画面表示)
Route::get('/product/edit/{id}', [App\Http\Controllers\ProductController::class, 'showEdit']) -> name('showEdit');

//(編集画面更新)
Route::put('/product/edit/{id}', [App\Http\Controllers\ProductController::class, 'exeUpdata']) -> name('updata');

//(削除)
Route::delete('/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'exeDelete']) -> name('delete');

