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
// Authentication Routes...
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login:get');
	Route::post('login', 'Auth\LoginController@login')->name('login:post');
	Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// if (env("CLTVO_OPEN_SITE")){
// 	// Registration Routes...
// 	Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register:get');
// 	Route::post('register', 'Auth\RegisterController@register')->name('register:post');
// }

// Password Reset Routes...
	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('pass_reset:get');
	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('pass_reset_email');
	Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('pass_reset_token');
	Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('pass_reset:post');

// set firstime Password
	Route::get('password/set/{user_email}', 'Auth\SetPasswordController@edit')->name('pass_set:get');
	Route::patch('password/set/{user_email}', 'Auth\SetPasswordController@update')->name('pass_set:patch');

// cambio de idiomas
    Route::get('lang/{language}','ChangeLanguageController@changeLang')->name('language');

// ruta de colecciones

	Route::group([ "as" => "collections." , "prefix"	=> "colecciones" ], function(){
		Route::resource('/','Client\Collections\CollectionsController',
			['only' => [ 'index', 'show'],
			'parameters' => ['' => 'public_collection']
		]);

		Route::get('tipos/{public_type}','Client\Collections\CollectionsController@types')->name('types');

	});

// ruta de productos
	Route::group([ "as" => "products." , "prefix"	=> "articulos" ], function(){
		Route::resource('/','Client\Collections\ProductsController',
			['only' => [  'show'],
			'parameters' => ['' => 'public_product']
		]);
		Route::get('categorias/{public_category}','Client\Collections\ProductsController@categories')->name('categories');
	});

// ruta de eventos
	Route::group([ "as" => "projects." , "prefix"	=> "eventos" ], function(){
		Route::resource('/','Client\Projects\ProjectsController',
			['only' => ['index',  'show'],
			'parameters' => ['' => 'public_project']
		]);
	});

// ruta de moodboards
	Route::group([ "as" => "moodboards." , "prefix"	=> "inspiracion" ], function(){
		Route::resource('/','Client\Moodboards\MoodboardsController',
			['only' => ['index',  'show'],
			'parameters' => ['' => 'public_moodboard']
		]);
	});

// ruta de prensa
	Route::group([ "as" => "press." , "prefix"	=> "prensa" ], function(){
		Route::resource('/','Client\Press\PressController',
			['only' => ['index',  'show'],
			'parameters' => ['' => 'public_press']
		]);
	});

// Contact
    Route::post('contact', 'Client\PagesController@contact')->name('contact');

	Route::group([ "as" => "pages."  ], function(){
		Route::resource('/','Client\PagesController',
			['only' => [ 'index', 'show'],
			'parameters' => ['' => 'public_page']
		]);


		Route::get('{public_page}/{public_child_page}','Client\PagesController@showChild')->name('showChild');
	});
