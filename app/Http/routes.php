<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', 'AbsensiController@index');

Route::get('indexjammasukterlambat', 'AbsensiController@indexjammasukterlambat');

Route::get('indexjamkeluar', 'AbsensiController@indexjamkeluar');

Route::get('indexnama', 'AbsensiController@indexnama');

Route::get('indextidakmasuk', 'AbsensiController@indextidakmasuk');

Route::get('angularjs', 'AbsensiController@cobaangularjs');

Route::post('cari/berdasarkan/tanggal', 'AbsensiController@cari');

Route::get('index/cari/berdasarkan/tanggal/{input}', 'AbsensiController@indextanggal');

Route::get('indexjammasukterlambat/cari/berdasarkan/tanggal/{input}', 'AbsensiController@indexjammasukterlambattanggal');

Route::get('indexjamkeluar/cari/berdasarkan/tanggal/{input}', 'AbsensiController@indexjamkeluartanggal');

Route::get('indexnama/cari/berdasarkan/tanggal/{input}', 'AbsensiController@indexnamatanggal');

Route::get('indextidakmasuk/cari/berdasarkan/tanggal/{input}', 'AbsensiController@indextidakmasuktanggal');

Route::get('historyperbulan/{id}', 'AbsensiController@historybulanini');

Route::post('historyabsenperbulan/{id}','AbsensiController@historyperbulan');