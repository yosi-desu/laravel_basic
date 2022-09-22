<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\HiLowController;
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

Route::get('/', fn () =>view('index'));

Route::get('/carriculum', fn () =>view('carriculum'));

Route::get('/hello_world', fn () => view('hello_world'));


Route::get('/hello', fn () => view('hello', [
    'name'=>'幸典',
    'course'=> 'laravel9'
]));


// 世界の時間
Route::get('/world-time', [UtilityController::class, 'worldtime']);

// おみくじ
Route::get('/omikuji', [GameController::class,'omikuji']);

// モンティ・ホール問題
Route::get('/monty-hall', [GameController::class,'montyHall']);

// リクエスト
Route::get('/form', [RequestController::class,'form']);
Route::get('/query-strings', [RequestController::class,'queryStrings']);

Route::get('/users/{id}', [RequestController::class,'profile'])->name('profile');
Route::get('/products/{category}/{year}', [RequestController::class,'productArchive']);
Route::get('route-link', [RequestController::class,'routelink']);


//ログイン
Route::get('/login', [RequestController::class,'loginForm']);
Route::post('/login', [RequestController::class,'login'])->name("login");

//イベント
Route::resource('/events', EventController::class)->only('create', 'store');

// ハイローゲーム
Route::get('/hi-low', [HiLowController::class, 'index'])->name('hi-low');
Route::post('/hi-low', [HiLowController::class, 'result']);
