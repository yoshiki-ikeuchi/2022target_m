<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ajax\AjaxTestController;
use App\Http\Controllers\Library\MainPageController;
use App\Http\Controllers\Library\UsersController;

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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/mainpage', [MainPageController::class,'default'])->middleware(['auth'])->name('mainpage');

//ユーザー一覧
Route::get('/users', [UsersController::class,'default'])->middleware(['auth','admin'])->name('users');

// ajaxのルートを書く
Route::post('/ajaxtest', [AjaxTestController::class,'test'])->middleware(['auth']);

// getを閉じる
Route::get('/ajaxtest', function(){
    return \App::abort(404);
});

// user更新
Route::post('/usersupdate', [UsersController::class,'window'])->middleware(['auth','admin'])->name('usersupdate');
Route::post('/usersupdateexec', [UsersController::class,'update'])->middleware(['auth','admin'])->name('usersupdateexec');

Route::get('/usersupdate', function(){
    return \App::abort(404);
});
Route::get('/usersupdateexec', function(){
    return \App::abort(404);
});

require __DIR__.'/auth.php';
