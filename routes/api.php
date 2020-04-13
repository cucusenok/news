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

Route::post('post/new',  'PostController@new')->name('post_new');

Route::get('media/post_image_upload',  'MediaController@postImage')->name('post_image_upload');

Route::get('media/send',  'MediaController@send')->name('send');

Route::get('bot',  'BotController@bot')->name('bot');
Route::get('bot/vk',  'BotController@vk')->name('vk');
Route::get('bot/telegram',  'BotController@telegram')->name('telegram');
Route::get('bot/spam',  'BotController@spam')->name('spam');

Route::get('bot/queue',  'BotController@queue')->name('queue');

Route::get('comments/{id}',  'CommentController@commentsByPost')->name('post_list');
//Route::get('comment/children/{id}',  'CommentController@commentsByPost')->name('post_list');

