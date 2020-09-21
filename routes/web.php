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
//导出
Route::get('/exportSchools/num/{num}', 'SchoolController@exportSchools');
Route::get('/exportFashions', 'FashionController@exportFashions');

Route::get('/school', 'SchoolController@index');