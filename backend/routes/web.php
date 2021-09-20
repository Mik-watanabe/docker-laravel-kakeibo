<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpendingController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\CategoryController;

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

Route::get('scss', function () {
    return view('test');
});
// トップ
Route::get('/top', [TopController::class, 'show'])
    ->name('top');
// 支出トップ
Route::get('/spending', [SpendingController::class, 'show'])
    ->name('spendings');
// 支出登録
Route::get('/spending/register', [SpendingController::class, 'create'])
    ->name('spendings.register');
Route::post('/spending/register', [SpendingController::class, 'store'])
    ->name('spendings.register');
// 支出編集
Route::get('/spending/edit/{spending}', [SpendingController::class, 'edit'])
    ->name('spendings.edit');
Route::post('/spending/edit', [SpendingController::class, 'update'])
    ->name('spendings.update');
//支出削除
Route::get('/spending/delete/{spending}', [SpendingController::class, 'destroy'])
    ->name('spendings.destroy');
// カテゴリトップ
Route::get('/category', [CategoryController::class, 'show'])
    ->name('category');
// カテゴリ登録
Route::post('/category', [CategoryController::class, 'store'])
    ->name('category');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
