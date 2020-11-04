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

    Route::get('followings/{id}', 'UsersController@followings')->name('users.followings');
    Route::get('followers/{id}', 'UsersController@followers')->name('users.followers');
});

Route::group(['prefix' =>'microposts', 'middleware' => 'auth'], function(){

    Route::get('index', 'MicropostsController@index')->name('microposts.index');
    Route::get('show/{id}', 'MicropostsController@show')->name('microposts.show');
    Route::get('create', 'MicropostsController@create')->name('microposts.create');
    Route::post('store', 'MicropostsController@store')->name('microposts.store');
    Route::get('edit/{id}', 'MicropostsController@edit')->name('microposts.edit');
    Route::post('update/{id}', 'MicropostsController@update')->name('microposts.update');
    Route::post('destroy/{id}', 'MicropostsController@destroy')->name('microposts.destroy');

    Route::get('{id}/likes', 'LikesController@index')->name('likes.index');
    Route::post('{micropost}/likes', 'LikesController@store')->name('likes.store');
    Route::post('{micropost}/likes/{like}', 'LikesController@destroy')->name('likes.destory');
}); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
