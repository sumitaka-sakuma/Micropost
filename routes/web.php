<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('users/index', 'UsersController@index')->name('users.index');
Route::get('users/show/{id}', 'UsersController@show')->name('users.show');
Route::get('users/edit/{id}', 'UsersController@edit')->name('users.edit');
Route::post('users/update/{id}', 'UsersController@update')->name('users.update');
Route::post('users/destory/{id}', 'UsersController@destory')->name('users.destory');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
