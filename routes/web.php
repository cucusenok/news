<?php
use App\Post;
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


/*
 * POST routes
 */
/*const POST_CONTROLLER = 'PostController';
const POST = 'post';*/


Route::get('/{any}', 'SpaController@index')->where('any', '.*');

Route::get('/', function () {
    return view('welcome');
});



/*
 * POST VIEWS
 */


Route::get(Post::$route['base'],  "PostController@index");

Route::get(Post::createRoute('view', ['id']),  Post::getController('view'))->name('post-view');

//Route::get(Post::$route['base'],  Post::createRoute('list'));

Route::get('vue',  "PostController@vue");

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
