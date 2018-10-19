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

Route::group(['prefix'=>'admin'], function(){

	Route::get('/', function(){ return view('admin.dashboard');} )->name('admin.index');

	Route::group(['prefix'=>'categories'], function(){
		Route::get('/', 'CategoryController@index')->name('categories.index');
		Route::get('/create', 'CategoryController@create')->name('categories.create');
		Route::post('/create', 'CategoryController@store')->name('categories.store');
	});

});