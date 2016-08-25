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


Route::group(['middleware' => ['web']], function(){
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::post('/signup', [
        'uses'=> 'UserController@postSignUp',
        'as'=>'signup'
    ]);

    Route::post('/sigin',[
        'uses'=> 'UserController@postSignIn',
        'as'=>'signin'

    ]);
    Route::get('/logout',[
        'uses'=>'PostController@getLogout',
        'as'=>'logout'
    ]);

    Route::get('/dashbord',[
        'uses'=> 'PostController@getDashbord',
        'as'=>'dashbord',
        'middleware'=>'auth'
    ]);

    Route::post('/createpost',[
        'uses'=> 'PostController@postCreatePost',
        'as' => 'post.create',
         'middleware'=>'auth'
    ]);
    Route::get('/delete/{post_id}',[
        'uses'=> 'PostController@getDeletePost',
        'as'=>'post.delete',
        'middleware'=>'auth'
    ]);
    Route::get('/account',[
        'uses'=>'UserController@getAccount',
        'as'=>'account'
    ]);
    Route::post('/updateaccount',[
        'uses'=>'UserController@postSaveaccount',
        'as'=>'account.save'
    ]);
    Route::get('userimage/{filename}',[
        'user'=>'UserController@getUserImage',
        'as'=>'account.image'
    ]);
});
