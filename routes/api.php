<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Posts;
use App\Models\Comments;
use App\Http\Controllers\CommentsController;


use App\Http\Controllers\PostsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::/*middleware('auth:api')->*/get('/posts',function(Request $request){
    return Posts::all();
});

Route::get('/posts/{id}',function(Request $request){
    return Comments::where('post_id',$request->id)->get();
});
Route::post('/posts/{id}/comments',[CommentsController::class,'store']);

