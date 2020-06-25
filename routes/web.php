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

Route::prefix('cms')->namespace('Auth')->group(function () {
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login');
    Route::post('/logout', 'LoginController@logout')->name('logout');

    Route::get('/password/confirm', 'ConfirmPasswordController@showConfirmForm')->name('password.confirm');
    Route::post('/password/confirm', 'ConfirmPasswordController@confirm');
    Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.update');
    Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
});

Route::middleware('auth')->prefix('cms')->namespace('Auth')->group(function () {

    // Route for register
    Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'RegisterController@register');
});

// CMS Route
Route::middleware('auth')->prefix('cms')->namespace('cms')->group(function () {

    // Route for dashboard
    Route::resource('/dashboard', 'AdminController')->only('index');

    // Route for all news features
    Route::resource('/post', 'PostController')->except('show');
    Route::resource('/category', 'CategoryController')->except('create', 'show', 'edit');
    Route::resource('/tag', 'TagController')->except('create', 'show', 'edit');
    Route::resource('/headline', 'HeadlineController')->except('show', 'edit', 'update');

    // Route for all reporter features
    Route::resource('/reporter', 'ReporterController');

    // Route for publish and revoke post
    Route::patch('/publish/{id}', 'PostController@publish')->name('post.publish');
    Route::patch('/revoke/{id}', 'PostController@revoke')->name('post.revoke');
});

//Guest Route
Route::name('guest.')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    route::prefix('post')->group(function () {
        Route::get('/{category}/{post}', 'HomeController@show')->name('post.show');
    });

    route::prefix('category')->group(function () {
        Route::get('/{category}', 'HomeController@category')->name('category.show');
    });

    route::prefix('tag')->group(function () {
        Route::get('/{tag}', 'HomeController@tag')->name('tag.show');
    });
});


// Return 404
Route::fallback(function () {
    return 'We are sorry, your page is not available';
});
