<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

// Pages routes
Route::get('/about', function () {
    return view('about');
});

Route::get('/services', function () {
    return view('services');
});

// Post routes (Homepage)
Route::group([], function () {
    Route::get('/', 'PostController@index');

    Route::get('/index', 'PostController@index');

    Route::get('/posts/{id}', 'PostController@show');

    Route::get('posts/category/{id}', 'PostCategoryController');
});

// Comment route
Route::post('comments', 'CommentController');


// Admin routes
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin.home');
    })->middleware('auth');

    Route::get('/index', function () {
        return view('admin.home');
    })->middleware('auth');

    // Post routes
    Route::resource('posts', 'AdminPostController')->middleware('auth');

    // Category routes
    Route::resource('categories', 'AdminPostCategoryController')->middleware('auth');

    // User routes
    Route::resource('users', 'AdminUserController')->middleware('auth');

    // User profile route
    Route::resource('profile', 'UserProfileController')->middleware('auth');

    // Change password route
    Route::resource('profile/password', 'ChangePasswordController')->middleware('auth');

    // Comment route
    Route::resource('comments', 'AdminCommentController')->middleware('auth');

    Auth::routes();

    Route::get('/home', 'DashboardController@index')->name('home');
});