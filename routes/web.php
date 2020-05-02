<?php

use App\Post;
use Illuminate\Support\Facades\Auth;
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
    });

    Route::get('/index', function () {
        return view('admin.home');
    });

    // Post routes
    Route::resource('posts', 'AdminPostController');

    // Category routes
    Route::resource('categories', 'AdminPostCategoryController');

    // User routes
    Route::resource('users', 'AdminUserController');

    // User profile route
    Route::get('profile', function () {
        return 'hey';
    });

    // Comment route
    Route::resource('comments', 'AdminCommentController');

    Auth::routes();

    Route::get('/home', 'DashboardController@index')->name('home');
});
