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
    Route::post('destroy/{id}', 'UsersController@destroy')->name('users.destroy');

    Route::post('{id}/follow', 'UsersController@follow')->name('follow');
    Route::delete('{id}/unfollow', 'UsersController@unfollow')->name('unfollow');

    Route::get('follow/{id}', 'UsersController@followings')->name('users.follow');
});

Route::group(['prefix' =>'microposts', 'middleware' => 'auth'], function(){

    Route::get('create', 'MicropostsController@create')->name('microposts.create');
    Route::post('store', 'MicropostsController@store')->name('microposts.store');
    Route::get('edit/{id}', 'MicropostsController@edit')->name('microposts.edit');
    Route::post('update/{id}', 'MicropostsController@update')->name('microposts.update');
    Route::post('destroy/{id}', 'MicropostsController@destroy')->name('microposts.destroy');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
