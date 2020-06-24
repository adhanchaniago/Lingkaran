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
Auth::routes();

// CMS Route
Route::middleware('auth')->prefix('cms')->namespace('cms')->group(function () {
    Route::resource('/dashboard', 'AdminController')->only('index');

    Route::resource('/post', 'PostController')->except('show');
    Route::resource('/category', 'CategoryController')->except('create', 'show', 'edit');
    Route::resource('/tag', 'TagController')->except('create', 'show', 'edit');
    Route::resource('/headline', 'HeadlineController')->except('show', 'edit', 'update');

    Route::patch('/publish/{id}', 'PostController@publish')->name('post.publish');
    Route::patch('/revoke/{id}', 'PostController@revoke')->name('post.revoke');
});

//Guest Route
Route::name('guest.')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/{category}/{post}', 'HomeController@show')->name('post.show');
    Route::get('/{category}', 'HomeController@category')->name('category.show');
    Route::get('/categories', 'HomeController@category_show')->name('category.all');
    Route::get('/{tag}', 'HomeController@tag')->name('tag.show');
    Route::get('/tags', 'HomeController@tag_show')->name('tag.all');
});

// Return 404
Route::fallback(function () {
    return 'We are sorry, your page is not available';
});
