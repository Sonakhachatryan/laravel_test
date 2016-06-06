<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//use App\Http\Controllers\UserController;

if(!session()->get('locale'))
    session()->set('locale','en');

Route::get('home','HomeController@index');
Route::get('/', 'HomeController@index');
Route::get('logout','UserController@logout'); 

Route::get('facebook', 'AccountController@facebook_redirect');
Route::get('account/facebook', 'AccountController@facebook');

Route::get('twitter', 'AccountController@facebook_redirect');
Route::get('account/twitter', 'AccountController@facebook');


Route::get('localize/{lang}', function($lang){
    if($lang=="ru")
    {
        session()->set('locale', 'ru');
    }
    else {
        session()->set('locale', 'en');
      }
       return redirect()->back();
      }
    );
    
    Route::group([
    'middleware' => 'user'
    ] , function(){
    Route::get('login','UserController@login_view');
    Route::post('login','UserController@login');
    Route::get('registrate','UserController@registrate');
    Route::post('registrate','UserController@create');   
    });
      
Route::group([
    'prefix' => 'user/{id}',
    'middleware' => 'user'
    ] , function (){
      Route::get('/','UserController@account');
//    Route::get('registrate','UserController@registrate');
//    Route::post('registrate','UserController@create');
      

   // Route::get('/','UserController@account');
    Route::group([
    'prefix' => 'post',
    ] , function (){
    Route::get('create','PostController@create_view');
    Route::get('update/{post_id}','PostController@update_view');
    Route::post('create','PostController@create');
    Route::post('update/{post_id}','PostController@update');
    Route::get('delete/{post_id}','PostController@delete');
    Route::get('read','PostController@show_post');
    }
        ); 
        
        
    Route::group([
    'prefix' => 'user',
    ] , function (){
    Route::get( 'update/{user_id}','UserController@update_view');
    Route::post('update/{user_id}','UserController@update');
    Route::get('delete/{user_id}','UserController@delete');
    Route::get('block/{user_id}','UserController@block');
    Route::get('unblock/{user_id}','UserController@unBlock');
    }
        );    
    });


  
    
    Route::get('user/localize/{lang}', function($lang){
    if($lang=="ru")
    {
        session()->set('locale', 'ru');
    }
    else {
        session()->set('locale', 'en');
      }
       return redirect()->back();
      }
    );    