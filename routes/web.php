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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');



Route::resource('/artists', 'ArtistController')->except('index');
Route::get('/artists', 'ArtistController@index')->name('artists.index');

Route::post('/filter', 'FilterController@genre')->name('filter.genre');

Route::resource('/parties', 'PartyController');

Route::post('/artists/filter', 'FilterController@filter')->name('artists.filter');

Route::post('comments/{id}', 'CommentsController@store')->name('comments.store');


Route::get('/error/access', 'ErrorController@access')->name('error.access');
Route::get('/error/login', 'ErrorController@login')->name('error.login');


Auth::routes();
