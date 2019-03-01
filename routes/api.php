<?php

Route::post('/register', 'Api\RegisterController@index');
Route::post('/login', 'Api\AuthController@login');
Route::post('/logout', 'Api\AuthController@logout');