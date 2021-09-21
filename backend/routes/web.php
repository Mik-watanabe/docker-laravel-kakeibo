<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpendingController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\IncomeSourceController;

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
//カテゴリ編集
Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])
    ->name('category.edit');
Route::post('/category/edit', [CategoryController::class, 'update'])
    ->name('category.update');
// カテゴリ削除
Route::get('/category/delete/{category}', [CategoryController::class, 'destroy'])
    ->name('category.destroy');

//収入トップ
Route::get('/income', [IncomeController::class, 'show'])
    ->name('income');
// 収入登録
Route::get('/income/register', [IncomeController::class, 'create'])
    ->name('income.register');
Route::post('/income/register', [IncomeController::class, 'store'])
    ->name('income.register');
// 収入の編集
Route::get('/income/edit/{income}', [IncomeController::class, 'edit'])
->name('incomes.edit');
Route::post('/income/edit', [IncomeController::class, 'update'])
->name('income.update');
// 収入の削除
Route::get('/income/delete/{income}', [IncomeController::class, 'destroy'])
->name('income.destroy');

// 収入源トップ
Route::get('/income-source', [IncomeSourceController::class, 'show'])
    ->name('incomeSource');
// 収入登録
Route::post('/income-source', [IncomeSourceController::class, 'store'])
    ->name('incomeSource');
//収入編集
Route::get('/income-source/edit/{incomeSource}', [IncomeSourceController::class, 'edit'])
    ->name('incomeSource.edit');
Route::post('/income-source/edit', [IncomeSourceController::class, 'update'])
    ->name('incomeSource.update');
// 収入削除
Route::get('/income-source/delete/{incomeSource}', [IncomeSourceController::class, 'destroy'])
    ->name('incomeSource.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
