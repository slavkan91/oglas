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

Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home','OglasController@store');

Route::middleware('admin')->group(function (){
    Route::get('/dodaj', 'HomeController@create')->name('dodaj');
    Route::get('/oglas', 'OglasController@index')->name('oglas');
    Route::patch('/oglas/{oglas}', 'OglasController@update');

    Route::get('/kategorija', 'KategorijaController@index')->name('kategorija');
    Route::post('/kategorija', 'KategorijaController@store');
    Route::get('/kategorija/{kategorija}/edit', 'KategorijaController@edit')->name('kategorija.edit');
    Route::patch('/kategorija/{kategorija}', 'KategorijaController@update');
    Route::delete('/kategorija/{kategorija}', 'KategorijaController@destroy');
});
