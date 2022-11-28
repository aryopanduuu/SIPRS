<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('index');

Route::prefix('poli')->name('poli.')->group(function () {
	Route::get('/', 'PoliController@index')->name('index');
	Route::get('tambah', 'PoliController@create')->name('create');
	Route::post('tambah', 'PoliController@store')->name('store');
	Route::get('ubah/{id}', 'PoliController@edit')->name('edit');
	Route::patch('ubah/{id}', 'PoliController@update')->name('update');
});

Route::prefix('spesialis')->name('spesialis.')->group(function () {
	Route::get('/', 'SpesialisController@index')->name('index');
	Route::get('tambah', 'SpesialisController@create')->name('create');
	Route::post('tambah', 'SpesialisController@store')->name('store');
	Route::get('ubah/{id}', 'SpesialisController@edit')->name('edit');
	Route::patch('ubah/{id}', 'SpesialisController@update')->name('update');
	Route::get('{id}/dokter', 'SpesialisController@show')->name('show');
});
