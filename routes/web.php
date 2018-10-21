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
		Route::get('/edit/{id}', 'CategoryController@edit')->name('categories.edit');
		Route::put('/edit/{id}', 'CategoryController@update')->name('categories.update');
		Route::get('/delete/{id}','CategoryController@destroy')->name("categories.destroy");
	});

	Route::group(['prefix'=>'books'], function(){
		Route::get('/', 'BookController@index')->name('book.index');
		Route::get('/create', 'BookController@create')->name('book.create');
		Route::post('/create', 'BookController@store')->name('book.store');
		Route::get('/edit/{id}', 'BookController@edit')->name('book.edit');
		Route::put('/edit/{id}', 'BookController@update')->name('book.update');
		Route::get('/delete/{id}','BookController@destroy')->name("book.destroy");
	});

	Route::group(['prefix'=>'images'], function(){
		Route::get('/', 'ImageController@index')->name('image.index');
		Route::get('/create', 'ImageController@create')->name('image.create');
		Route::post('/create', 'ImageController@store')->name('image.store');
		Route::get('/edit/{id}', 'ImageController@edit')->name('image.edit');
		Route::put('/edit/{id}', 'ImageController@update')->name('image.update');
		Route::get('/delete/{id}','ImageController@destroy')->name("image.destroy");
	});

	Route::group(['prefix'=>'author'], function(){
		Route::get('/', 'AuthorController@index')->name('author.index');
		Route::get('/create', 'AuthorController@create')->name('author.create');
		Route::post('/create', 'AuthorController@store')->name('author.store');
		Route::get('/edit/{id}', 'AuthorController@edit')->name('author.edit');
		Route::put('/edit/{id}', 'AuthorController@update')->name('author.update');
		Route::get('/delete/{id}','AuthorController@destroy')->name("author.destroy");
	});

	Route::group(['prefix'=>'user'], function(){
		Route::get('/', 'UserController@index')->name('user.index');
		Route::get('/create', 'UserController@create')->name('user.create');
		Route::post('/create', 'UserController@store')->name('user.store');
		Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
		Route::put('/edit/{id}', 'UserController@update')->name('user.update');
		Route::get('/delete/{id}','UserController@destroy')->name("user.destroy");
	});

});