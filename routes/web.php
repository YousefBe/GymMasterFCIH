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

Route::get('/contact', function () {
    return view('posts.contact');
});
Route::post('/contact',[
    'uses'=>'PostsController@store',
    'as'=>'contact.store'
]);

route::get('/contact-us' , 'ContactController@create');
route::post('/contact-us/send' , 'ContactController@store');

route::prefix('admin')->group(function(){
    //login routes
    Route::get('/login', 'Auth\AdminLoginController@ShowLoginForm')->name('admin.login');
    Route::Post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    //profile
    route::get('/' , 'AdminController@index')->name('admin.Dasboard');
    //update profile
    Route::get('/{admin}/edit', 'AdminController@edit')->name('admin.edit');  
    Route::patch('/{admin}', 'AdminController@update')->name('admin.update'); 
    //mange members and coaches
    Route::get('/MangeMembers' , 'AdminController@MangeMembers');
    Route::get('/MangeCoaches' , 'AdminController@MangeCoaches');
    
    Route::delete('/{user}/MemberDelete', 'AdminController@DestroyMembers');
    Route::delete('/{coach}/CoachDelete', 'AdminController@DestroyCoach');
    //assign coaches
    Route::get('/{user}/SetCoach', 'AdminController@AssignCoach')->name('SetCoach');
    Route::patch('/{user}/CA', 'AdminController@AssignConfirm');
    //add a new coach 
    Route::get('/AddCoach' , 'AdminController@addNewCoach');
    Route::post('/createCoach' , 'AdminController@createCoach')->name('Addcoach');
    //add a new admin
    Route::get('/AddAdmin' , 'AdminController@AddaNewAdmin');
    Route::Post('/create' , 'AdminController@createAdmin');
    //Show All Admins
    Route::get('/AllAdmins' , 'AdminController@myAdmins');
    });
    
route::prefix('coach')->group(function(){
    Route::get('/login', 'Auth\CoachLoginController@ShowLoginForm')->name('coach.login');
    Route::post('/login', 'Auth\CoachLoginController@login')->name('coach.login.submit');
    route::get('/' , 'CoachController@index')->name('Coach.Dasboard');

    route::get('/{coach}/edit' , 'CoachController@edit');
    route::patch('/Profile/{coach}' , 'CoachController@Update');

    route::get('/members' ,'CoachController@myMembers')->name('membs');
    route::get('/{user}/SendMessage' ,'CoachController@DM');
    route::post('/{user}/DirectMessage' ,'CoachController@DirectMessage');
    route::get('/{user}/setPlan' , 'CoachController@SetMemPlan');
    route::Patch('/{user}/SavePLan' , 'CoachController@StorePlan');
    route::get('/MyInbox' , 'CoachController@MyMessages');
    route::get('/theMsg/{msg}' , 'CoachController@ViewMsg')->name('msgD');

});
   


route::prefix('member')->group(function(){
    
    route::get('/profile' ,'UserController@index');

    route::get('/DMYorCoach' , 'UserController@DMCoach');
    route::post('/SendMessage/{coach}' , 'UserController@SendCoachMessage');


    route::get('/MyMsgs', 'UserController@MyMsgs');
    route::get('/TheMsg/{msg}', 'UserController@ViewMsg');
    
    route::get('/Profile/edit/{user}' , 'UserController@edit');
    route::PATCH('/Profile/{user}' , 'UserController@update');

});