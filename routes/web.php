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

Route::resource('mahasiswa','mahasiswaController');
Route::post('mahasiswa', 'mahasiswaController@index');
Route::get('excel','mahasiswaController@excel')->name('mahasiswa.excel');
//Route::get('mahasiswa','HomeController@index');
//Route::get('mahasiswa.excel','mahasiswaController@excel');
