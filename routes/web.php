<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\NewsPostController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', [HomeController::class, 'index']);

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
 
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    Route::group(['middleware' => ['guest']], function() {
        
            Route::get('/payment', [HomeController::class, 'paymentPage'])->name('paymentPage');
            Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
            Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);
       
        /**
         * Register Routes
         */
        Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
        Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', [LoginController::class, 'show'])->name('login.show');
        Route::post('/login', [LoginController::class, 'login'])->name('login.perform');

    });
    
    Route::group(['middleware' => ['auth']], function() {
       
        Route::get('/admin/{newsPost}', [AdminController::class, 'show'])->name('admin.show');
        Route::get('/admin/create/news', [AdminController::class, 'create'])->name('admin.create');
        Route::post('/admin/create/news',[AdminController::class, 'store'])->name('admin.store');
        Route::get('/admin/{newsPost}/edit', [AdminController::class, 'edit'])->name('admin.edit');
        Route::put('/admin/{newsPost}/edit', [AdminController::class, 'update'])->name('admin.update');
        Route::delete('/admin/{newsPost}',[AdminController::class, 'destroy'])->name('admin.destroy');
        /**
         * Logout Routes
         */
        Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
    });
});

