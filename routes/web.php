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

Route::get('/','Auth\LoginController@showLoginForm')->name('login_form');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('committee', 'CommitteeController');
Route::resource('mp', 'MemberParliamentController');
Route::resource('party', 'PoliticalPartyController');
Route::resource('parliament', 'ParliamentController');