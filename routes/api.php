<?php

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get(Post::createRoute('view', ['id']),  Post::getController('view'))->name('post_view');

Route::get(Post::createRoute('list'),  Post::getController('list'))->name('post_list');

Route::get('comments/{id}',  'CommentController@commentsByPost')->name('post_list');
//Route::get('comment/children/{id}',  'CommentController@commentsByPost')->name('post_list');

