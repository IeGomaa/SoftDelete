<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::group(['as' => 'error.'], function () {
    Route::controller(ErrorController::class)->group(function () {
        Route::get('404', 'page_not_found')->name('404');
    });
});

Route::group(['as' => 'auth.'], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('login', 'login')->name('login');
    });
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {

    Route::controller(HomeController::class)->group(function () {
        Route::get('index', 'index')->name('index');
    });

    Route::controller(AuthController::class)->group(function () {
        Route::get('logout', 'logout')->name('logout');
    });

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
        });
    });

    Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
        Route::controller(PostController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete', 'delete')->name('delete');
            Route::delete('forceDelete', 'forceDelete')->name('force-delete');
            Route::post('edit', 'edit')->name('edit');
            Route::put('update', 'update')->name('update');
        });
    });

    Route::group(['prefix' => 'comment', 'as' => 'comment.'], function () {
        Route::controller(CommentController::class)->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('forceDelete', 'forceDelete')->name('force-delete');
            Route::delete('delete', 'delete')->name('delete');
            Route::post('edit', 'edit')->name('edit');
            Route::put('update', 'update')->name('update');
        });
    });

});
