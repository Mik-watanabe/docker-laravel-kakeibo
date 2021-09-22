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
Route::middleware(['auth'])->group(function () {
    // トップ
    Route::get('/top', [TopController::class, 'show'])
        ->name('top');

    Route::group(['prefix' => 'spending', 'as' => 'spendings.'], function () {
        // 支出トップ
        Route::get('/', [SpendingController::class, 'show'])
            ->name('top');
        // 支出登録
        Route::get('/register', [SpendingController::class, 'create'])
            ->name('register');
        Route::post('/register', [SpendingController::class, 'store'])
            ->name('register');
        // 支出編集
        Route::get('/edit/{spending}', [SpendingController::class, 'edit'])
            ->name('edit');
        Route::post('/edit', [SpendingController::class, 'update'])
            ->name('update');
        //支出削除
        Route::get('/delete/{spending}', [SpendingController::class, 'destroy'])
            ->name('destroy');
    });

    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        // カテゴリトップ
        Route::get('/', [CategoryController::class, 'show'])
            ->name('top');
        // カテゴリ登録
        Route::post('/', [CategoryController::class, 'store'])
            ->name('category');
        //カテゴリ編集
        Route::get('/edit/{category}', [CategoryController::class, 'edit'])
            ->name('edit');
        Route::post('/edit', [CategoryController::class, 'update'])
            ->name('update');
        // カテゴリ削除
        Route::get('/delete/{category}', [CategoryController::class, 'destroy'])
            ->name('destroy');
    });

    Route::group(['prefix' => 'income', 'as' => 'income.'], function () {
        //収入トップ
        Route::get('/', [IncomeController::class, 'show'])
            ->name('top');
        // 収入登録
        Route::get('/register', [IncomeController::class, 'create'])
            ->name('register');
        Route::post('/register', [IncomeController::class, 'store'])
            ->name('register');
        // 収入の編集
        Route::get('/edit/{income}', [IncomeController::class, 'edit'])
        ->name('edit');
        Route::post('/edit', [IncomeController::class, 'update'])
        ->name('update');
        // 収入の削除
        Route::get('/delete/{income}', [IncomeController::class, 'destroy'])
        ->name('destroy');
    });

    Route::group(['prefix' => 'income-source', 'as' => 'incomeSource.'], function () {
        // 収入源トップ
        Route::get('/', [IncomeSourceController::class, 'show'])
        ->name('top');
        // 収入登録
        Route::post('/', [IncomeSourceController::class, 'store'])
            ->name('top');
        //収入編集
        Route::get('/edit/{incomeSource}', [IncomeSourceController::class, 'edit'])
            ->name('edit');
        Route::post('/edit', [IncomeSourceController::class, 'update'])
            ->name('update');
        // 収入削除
        Route::get('/delete/{incomeSource}', [IncomeSourceController::class, 'destroy'])
            ->name('destroy');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
