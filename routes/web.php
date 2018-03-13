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

Route::get('/', 'HomeController@index')->name('simple');

Route::get('/row-details', 'HomeController@getRowDetails')->name('row_details');

Route::get('/master-details', 'HomeController@getMasterDetails')->name('master_details');

Route::get('/column_search', 'HomeController@getColumnSearch')->name('column_search');

Route::get('/row-attributes', 'HomeController@getRowAttributes')->name('row_attributes');

Route::get('/carbon', 'HomeController@getCarbon')->name('carbon');

