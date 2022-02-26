<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; //追加

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

// ログイン画面を表示
Route::get('/', function () {
    return view('/auth/login');
});

// ログイン成功→商品一覧画面を表示
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [ProductController::class, 'showList'])->name('products');

// 商品登録画面を表示
Route::get('/product/create', [ProductController::class, 'showCreate'])->name('create');

// 商品登録
Route::post('/product/store', [ProductController::class, 'exeStore'])->name('store');

// 商品詳細画面を表示
Route::get('/product/{id}', [ProductController::class, 'showDetail'])->name('show');

// 商品編集画面を表示
Route::get('/product/edit/{id}', [ProductController::class, 'showEdit'])->name('edit');

// 商品更新
Route::post('/product/update', [ProductController::class, 'exeUpdate'])->name('update');

//商品削除
Route::post('/product/delete/{id}', [ProductController::class, 'exeDelete'])->name('delete');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
