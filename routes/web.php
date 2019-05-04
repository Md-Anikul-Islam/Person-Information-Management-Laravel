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

Route::get('/', 'UserController@index');
Route::post('/userdata', 'UserController@userdata');


Route::get('/', 'WebController@index');
Route::post('/userdata', 'WebController@userdata');
Route::get('/edit-users/{ID}', 'WebController@editusers');
Route::get('/delete-users/{ID}', 'WebController@deleteusers');
Route::post('/update-users', 'WebController@updateusers');