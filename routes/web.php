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

//Guest Route
Route::get('/', 'HomeController@index')->name('guest.home');
Route::get('/post', 'HomeController@show')->name('guest.post');

// CMS Route
Route::middleware('auth')->namespace('cms')->group( function (){
    Route::get('/admin', 'AdminController@index')->name('admin.home');
    Route::get('/admin/post/index', 'PostController@index')->name('post.index');
    Route::get('/admin/category/index', 'CategoryController@index')->name('category.index');
});