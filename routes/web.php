<?php

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

Route::get('/email/verify/{token}',['as'=>'email.verify','uses'=>'emailController@verify']);

Route::resource('/question','QuestionController');

Route::get('/topic',"TopicSelectController@getSuggestion");
Route::resource('/topics','TopicController');
