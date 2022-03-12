<?php

use App\Http\Controllers\NewsPostController;
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

Route::get('/news', [NewsPostController::class, 'index']);
Route::get('/news/{newsPost}', [NewsPostController::class, 'show']);
Route::get('/news/create/new_news', [NewsPostController::class, 'create']);
Route::post('/news/create/new_news', [NewsPostController::class, 'store']);
Route::get('/news/{newPost}/edit', [NewsPostController::class, 'edit']);
Route::put('/news/{newPost}/edit', [NewsPostController::class, 'update']);
Route::delete('/news/{newPost}', [NewsPostController::class, 'destroy']);
Route::get('/', function () {
    return view('welcome');
});

//Admin routes

Route::prefix('admin')->group(function() {
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'Auth\AdminController@index')->name('admin.index');
   }) ;

