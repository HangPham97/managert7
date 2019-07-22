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
Route::get('/home/datatable','DatatablesController@anyData')->name('datatables.data');
Route::get('/home','DatatablesController@index')->name('datatables');
Route::resource('user','UserController');
//Route::get('/user/{id}','UserController@destroy')->name('user.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
