<?php

use App\Http\Controllers\Guest\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', 'Guest\HomeController@home')->name('home');

Route::prefix('guest')
    ->namespace('Guest')
    ->name("guest.")
    ->group(function () {
        // Route::get('', "HomeController@home")->name("home");
        Route::get('index', "PostController@index")->name("index");
        Route::get('show/{id}', "PostController@show")->name("show");
    });

Auth::routes();

Route::prefix('api')
    ->namespace('Api')
    -> name('api.')
    -> group(function () {
        Route::get('post', 'Api\PostController@index')->name('index');
    });


Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name("admin.")
    ->group(function () {
        // Route::get('', "HomeController@home")->name("home");
        Route::get('tag', "TagController@index")->name("tag.index");

        Route::get('private', "HomeController@private")->name("private");

        Route::get('index', 'PostController@index')->name('index');

        Route::get("post/create", "PostController@create")->name("create");

        Route::post("post", "PostController@store")->name("store");

        Route::get('post/{id}', "PostController@show")->name("show");

        Route::get('post/{id}/edit', "PostController@edit")->name("edit");

        Route::match(["PUT", "PATCH"], "post/{id}/update", "PostController@update")->name("update");

        Route::delete("post/{id}", "PostController@destroy")->name("destroy");
    });
