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

<<<<<<< HEAD
Route::get('/','PostsController@index');
=======
Route::get('/','PostsController@index' );

Route::get('/signup','PostsController@Signup' );
Route::get('/login','PostsController@Login' );
Route::get('/', function () {
    return view('posts.Home');
});
>>>>>>> heads/1
