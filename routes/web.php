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
Route::post('/challenge/store', 'ChallengeController@store')->name('challenge.store');
Route::post('/challenge/edit/{id}', 'ChallengeController@edit')->name('challenge.edit');
Route::post('/challenge/{id}/destory', 'ChallengeController@destroy')->name('challenge.destroy');
Route::any('/challenge/view/{id}', 'ChallengeController@view')->name('challenge.view');
Route::any('/challenge/{id}/participate', 'ChallengeController@participate')->name('challenge.participate');


Route::any('/challenge/{id}/participants', 'ParticipantController@index')->name('participant.index');
Route::any('/challenge/{id}/submitcode', 'ParticipantController@store')->name('participant.store');


Route::post('/comment/{id}/edit', 'CommentController@edit')->name('comment.edit');
Route::post('/comment/{id}/delete', 'CommentController@destroy')->name('comment.delete');



Route::get('/users', 'UserController@index')->name('user.index');
Route::post('/user/edit', 'UserController@update')->name('user.edit');

Route::resource('comments', 'CommentController');





