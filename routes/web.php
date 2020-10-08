<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/posts',[PostsController::class,'index'])->name('posts.index')->middleware('auth');
Route::get('/posts/new',[PostsController::class,'create'])->name('post.create')->middleware('auth');
//Route::post('/posts',[PostsController::class,'store'])->name('post.store')->middleware('auth');
Route::put('/posts/{post}',[PostsController::class,'update'])->name('post.update')->middleware('auth');
Route::get('/posts/{post}',[PostsController::class,'show'])->name('post.show')->middleware('auth');
Route::get('/posts/{post}/edit',[PostsController::class,'edit'])->name('post.edit')->middleware(['auth','can:update,post']);
Route::delete('posts/{post}',[PostsController::class,'destroy'])->name('post.delete')->middleware('auth');