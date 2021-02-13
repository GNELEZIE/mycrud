<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/create','StudentController@create')->name('student.create');
Route::post('/store','StudentController@store')->name('student.store');
Route::get('/','StudentController@index')->name('home');
Route::get('/edit/{id}','StudentController@edit')->name('student.edit');
Route::post('/update','StudentController@update')->name('student.update');
Route::delete('/delete/{id}','StudentController@destroy')->name('student.delete');
Route::get('/show/{id}','StudentController@show')->name('student.show');
