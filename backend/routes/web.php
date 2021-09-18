<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpendingController;

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
    return view('welcome');
})->name('top');

Route::get('scss', function () {
    return view('test');
});
// 支出トップ
Route::get('/spending', [SpendingController::class, 'show'])
    ->name('spendings');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
