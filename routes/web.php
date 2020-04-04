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

Route::get('/','PostsController@index' );

Route::get('/signup','PostsController@Signup' );
Route::get('/login','PostsController@Login' );
Route::get('/', function () {
    return view('posts.Home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/contact', function () {
    return view('posts.contact');
});
Route::post('/contact',[
    'uses'=>'PostsController@store',
    'as'=>'contact.store'
]);


route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@ShowLoginForm')->name('admin.login');
    Route::Post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    route::get('/' , 'AdminController@index')->name('admin.Dasboard');
    
    
    });
    

    Route::get('/coach/login', 'Auth\CoachLoginController@ShowLoginForm')->name('coach.login');
    Route::post('/coach/login', 'Auth\CoachLoginController@login')->name('coach.login.submit');
    route::get('/coach' , 'CoachController@index')->name('Coach.Dasboard');