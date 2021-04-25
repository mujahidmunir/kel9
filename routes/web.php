<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\DashboardConroller;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\GoogleController;
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
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Auth::routes();

Route::group(['middleware' => 'auth:web'], function () {
    Route::post('/create-comment' , [CommentController::class, 'createComment']);
    Route::get('/', [PageController::class, 'Index']);
    Route::get('/news', [PageController::class, 'News']);
    Route::get('/news/{slug}', [PageController::class, 'DetailNews']);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth:web'], function () {
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/', [DashboardConroller::class, 'Index']);
        Route::get('/category', [DashboardConroller::class, 'viewCategory']);
        Route::post('/category', [DashboardConroller::class, 'addCategory']);
        Route::post('/category/update/{id}', [DashboardConroller::class, 'updateCategory']);
        Route::get('/category/delete/{id}', [DashboardConroller::class, 'deleteCategory']);


        Route::get('/news/add', [DashboardConroller::class, 'addNews']);
        Route::post('/news/add', [DashboardConroller::class, 'StoreNews']);
        Route::get('news/delete/{id}', [DashboardConroller::class, 'newsDelete']);
        Route::get('news/edit/{id}', [DashboardConroller::class, 'newsEdit']);
        Route::post('news/update/{id}', [DashboardConroller::class, 'newsUpdate']);



        Route::get('/news/view', [DashboardConroller::class, 'viewNews']);

//
//        Route::get('/news', [NewsController::class, 'Index']);
//        Route::get('/news/create', [NewsController::class, 'Create']);
//        Route::post('/news/create', [NewsController::class, 'Store']);
//        Route::post('/news/create/{id}', [NewsController::class, 'Update']);


    });
});

