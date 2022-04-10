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

Route::get('/', function () {
    return view('welcome');
});

Route::resource("posts", 'App\Http\Controllers\PostsController');
Route::post('/posts/{post}', 'App\Http\Controllers\PostsController@update');

Route::get('/album', 'App\Http\Controllers\AlbumController@index');
