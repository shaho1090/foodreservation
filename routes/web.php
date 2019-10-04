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
/*
----------Authentication--------------
*/


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', function () {
    return view('home');
});


/*Route::get('/home', function () {
    return view('home');
});*/
Route::get('/about', function () {
    return view('about');
});


/*
|---------working on foods---------------
*/
Route::get('/addfood', 'FoodsController@add');
Route::post('/addfood', 'FoodsController@store');
Route::get('/foods', 'FoodsController@index');
Route::get('/food/{slug?}', 'FoodsController@show');
Route::get('/food/edit/{slug?}','FoodsController@edit');
Route::post('/food/edit/{slug?}','FoodsController@update');
Route::post('/food/destroy/{slug?}','FoodsController@destroy');

/*
|---------working on weeks---------------
*/
Route::get('/addweek', 'WeeksController@add');
Route::post('/addweek', 'WeeksController@store');
Route::get('/weeks', 'WeeksController@index');
Route::get('/week/{id?}', 'WeeksController@show');
Route::get('/week/edit/{id?}','WeeksController@edit');
Route::post('/week/edit/{id?}','WeeksController@update');
Route::post('/week/destroy/{id?}','WeeksController@destroy');
/*
|---------working on Day of Weeks---------------
*/
Route::get('/createday/{id?}', 'DaysOfWeeksController@create');
Route::get('/daysofweeks', 'DaysOfWeeksController@index');
Route::get('/daysofweeks/{id?}', 'DaysOfWeeksController@show');
/*
|---------working on Foods Of Days---------------
*/
Route::get('/foodsofdays/show/{id?}', 'FoodsOfDaysController@show');
Route::post('/foodsofdays/add', 'FoodsOfDaysController@add');
Route::post('/foodsofdays/destroy', 'FoodsOfDaysController@destroy');




