<?php

use Illuminate\Support\Facades\Route;

// Login Routes
Auth::routes();

// CMS Routes
Route::middleware(['auth', 'role:Administrator|Editor|Reporter'])->prefix('cms')->namespace('cms')->group(function () {

    // Route for admin dashboard
    Route::resource('/dashboard', 'AdminController')->only('index');

    // Route for all news features
    Route::resource('/post', 'PostController')->except('show');
    Route::resource('/category', 'CategoryController')->except('create', 'show', 'edit');
    Route::resource('/tag', 'TagController')->except('create', 'show', 'edit');

    // Route for admin personal profile
    Route::resource('/profile', 'ProfileController')->only(['show', 'update']);
    Route::patch('/profile/image/{id}', 'ProfileController@changeImage')->name('profile.image');
    Route::get('/profile/password/{id}', 'ProfileController@passwordEdit')->name('password.edit');
    Route::patch('/profile/password/{id}', 'ProfileController@passwordUpdate')->name('admin.password.update');

    Route::middleware('role:Administrator|Editor')->group(function () {
        Route::resource('/headline', 'HeadlineController')->except('show', 'edit', 'update');

        // Route for publish and revoke post
        Route::patch('/publish/{id}', 'PostController@publish')->name('post.publish');
        Route::patch('/revoke/{id}', 'PostController@revoke')->name('post.revoke');
    });

    Route::middleware('role:Administrator')->group(function () {
        // Route for all user features
        Route::resource('/user', 'UserController');
        Route::resource('/guestuser', 'GuestUserController')->except('create', 'edit', 'show');
    });
});

// Guestuser Dashboard
Route::middleware(['auth', 'role:Writer'])->prefix('guestuser')->name('guestuser.')->group(function () {
    Route::get('/dashboard', function () {
        return view('guest.dashboard.index');
    })->name('dashboard');
});

//Guest Routes
Route::name('guest.')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/category', 'CategoryController@index')->name('category.index');
    Route::get('/category/{category}', 'CategoryController@show')->name('category.show');
    Route::get('/tag/{tag}', 'TagController@show')->name('tag.show');
    Route::get('/{category}/{post}', 'HomeController@show')->name('post.show');

    // Route for record visitor
    Route::post('/addvisitor', 'HomeController@addVisitor')->name('add.visitor');
});

// Return 404
Route::fallback(function () {
    return 'We are sorry, your page is not available';
});
