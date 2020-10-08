<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' =>'users', 'middleware' => 'auth'], function(){

    Route::get('index', 'UsersController@index')->name('users.index');
    Route::get('show/{id}', 'UsersController@show')->name('users.show');
    Route::get('edit/{id}', 'UsersController@edit')->name('users.edit');
    Route::post('update/{id}', 'UsersController@update')->name('users.update');
    Route::post('destory/{id}', 'UsersController@destory')->name('users.destory');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
