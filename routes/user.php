<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => '{user}' ], function(){
    Route::get('/', 'Users\UserController@show')->name('profile');

    Route::patch('/', 'Users\UserController@updateEmail')->name('email.update');
    Route::patch('password', 'Users\UserController@updatePassword')->name('password.update');

});
