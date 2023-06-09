<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\IndexController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function(): void{
    Route::get('/', IndexController::class)->name('index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});

Route::group(['prefix' => ''], static function(){
    Route::get('/news', [NewsController::class, 'index'])->name('news');
    Route::get('/news/show/{id}', [NewsController::class, 'show'])
        ->where('id', '\d+')->name('news.show');
});

