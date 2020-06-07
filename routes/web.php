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

// CMS Route
Route::middleware('auth')->prefix('cms')->namespace('cms')->group( function (){
    Route::get('/dashboard', 'AdminController@index')->name('dashboard.index');
    Route::get('/post', 'PostController@index')->name('post.index');
    Route::get('/category', 'CategoryController@index')->name('category.index');
});