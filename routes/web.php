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
    Route::resource('/category', 'CategoryController')->except('create', 'show');
    Route::resource('/headline', 'HeadlineController');

    Route::patch('/publish/{id}', 'PostController@publish')->name('post.publish');
    Route::patch('/revoke/{id}', 'PostController@revoke')->name('post.revoke');
});

//Guest Route
Route::name('guest.')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/{category}/{post}', 'HomeController@show')->name('post.show');
});

Auth::routes();