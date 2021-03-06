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
Route::group(['prefix' => 'admin',  'middleware' => ['auth','admin'],'namespace' => 'Admin'], function(){


    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/datatable','DatatablesController@anyData')->name('datatables.data');
    Route::get('/home','DatatablesController@index')->name('datatables');
    Route::resource('user','UserController');
    Route::get('/profile','UserController@profile');
    Route::resource('time','TimeSettingController');
});
Auth::routes();


Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', function () {
    return view('create_timesheet');
});
Route::group(['middleware'=>['auth','admin']],function (){
   Route::resource('timesheet','TimesheetController');
});
