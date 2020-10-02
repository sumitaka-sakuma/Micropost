<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('users/index', 'UsersController@index')->name('users.index');
Route::get('users/show/{id}', 'UsersController@show')->name('users.show');
Route::get('users/edit/{id}', 'UsersController@edit')->name('users.edit');
Route::post('users/update/{id}', 'UsersController@update')->name('users.update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
