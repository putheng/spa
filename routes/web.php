<?php

Route::get('/', function () {
    return view('auth.login');
});

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['as' => 'auth.', 'namespace' => 'Api', 'middleware' => ['guest']], function(){
	Route::get('/login', 'LoginController@index')->name('login');
	Route::post('/login', 'LoginController@login');

	Route::post('/logout', 'LoginController@logout');
});


Route::post('/logout', 'Api\LoginController@logout')->name('logout');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'namespace' => 'Dashboard', 'middleware' => ['auth']], function(){

	Route::get('/', 'DashboardController@index')->name('index');

	Route::group(['prefix' => 'question', 'as' => 'question.', 'namespace' => 'Question'], function(){
		Route::get('/all', 'QuestionController@index')->name('index');

		Route::get('/create', 'CreateController@index')->name('create');
		Route::post('/create', 'CreateController@store');

		Route::post('/answer', 'CreateController@answer')->name('answer');

		Route::get('/add', 'UpdateController@update')->name('update');
		Route::post('/add', 'UpdateController@store');
	});
});