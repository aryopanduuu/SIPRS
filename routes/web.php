<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('pages.index');
})->name('home');

Route::prefix('appointment')->name('appointment.')->group(function () {
	Route::get('/', 'AppointmentController@index')->name('index');
	Route::post('/', 'AppointmentController@checkNomorRekamMedis')->name('search');
});
