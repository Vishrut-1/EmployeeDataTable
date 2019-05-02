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


Route::get('/form','EmployeeController@index');
Route::post('/form','EmployeeController@store');
Route::delete('/datatable/delete/{id}','EmployeeController@delete');
Route::get('/datatable','EmployeeController@display');

Route::get('/edit/{id}','EmployeeController@edit');
Route::get('/edit/{id}','EmployeeController@edit');


Route::get('/search','EmployeeController@search');


Route::get('/date','DateController@index');








Route::get('/file','DateController@showfile');

Route::post('/file','DateController@showuploadfile');







