<?php

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

// CMS Route
Route::middleware('auth')->prefix('cms')->namespace('cms')->group( function (){
    Route::resource('/dashboard', 'AdminController')->only('index');
    Route::resource('/post', 'PostController')->except('show');
    Route::patch('/publish/{id}', 'PostController@publish')->name('post.publish');
    Route::patch('/unpublish/{id}', 'PostController@unpublish')->name('post.unpublish');
    Route::resource('/category', 'CategoryController')->except('create', 'show');
});

//Guest Route
Route::name('guest.')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/{category}/{post}', 'HomeController@show')->name('post.show');
});

Auth::routes();