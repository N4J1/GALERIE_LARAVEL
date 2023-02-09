<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\User;
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
// initial route
Route::get('/{url}', [PostController::class, 'index'])->where('url', '|posts');

Route::get('/about', function () {
   return view('about');
});


// create new post
Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth');
Route::post('/posts/create', [PostController::class, 'store'])->middleware('auth');

// add comment on a post
Route::post('/posts/{id}/comments', [CommentController::class, 'create'])->middleware('auth');

// edit post
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->middleware('auth');
Route::put('/posts/{post}', [PostController::class, 'update'])->middleware('auth');

// delete post
Route::delete('/posts/{post}', [PostController::class, 'delete'])->middleware('auth');

// show one post
Route::get('/posts/{post}', [PostController::class, 'show']);


// user profile
Route::get('/profile/{user}', [UserController::class, 'index']);
// Register User Page
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/register', [UserController::class, 'store'])->middleware('guest');

// Login User
Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [UserController::class, 'authenticate'])->middleware('guest');

// Logout User
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
