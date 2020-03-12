<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/challenges', 'ChallengeController@index')->name('challenge.index');
Route::post('/challenge/add', 'ChallengeController@add')->name('challenge.add');
Route::post('/challenge/edit', 'ChallengeController@update')->name('challenge.edit');
Route::any('/challenge/details/{id}', 'ChallengeController@view')->name('challenge.view');
Route::post('/challenge/comment', 'ChallengeController@create')->name('challenge.create');



Route::get('/users', 'UserController@index')->name('user.index');
Route::post('/user/edit', 'UserController@update')->name('user.edit');





