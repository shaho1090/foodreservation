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
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/addfood', 'FoodsController@add');
Route::post('/addfood', 'FoodsController@store');

Route::get('/foods', 'FoodsController@index');

Route::get('/food/{slug?}', 'FoodsController@show');
Route::get('/food/edit/{slug?}','FoodsController@edit');
Route::post('/food/edit/{slug?}','FoodsController@update');
Route::post('/food/destroy/{slug?}','FoodsController@destroy');
