<?php

use App\Http\Controllers\poliController;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('pages.index');
})->name('home');

Route::get('/tentang', function () {
	return view('pages.tentang');
})->name('tentang');

Route::prefix('pendaftaran-online')->name('appointment.')->group(function () {
	Route::get('/', 'AppointmentController@index')->name('index');
	Route::get('ticket/{id}', 'AppointmentController@show')->name('show');
	Route::prefix('pasien-lama')->name('pasien-lama.')->group(function () {
		Route::get('/', 'AppointmentController@pasienLama')->name('index');
		Route::post('/', 'AppointmentController@checkNomorRekamMedis')->name('search');
	});
});

Route::get('/poli', 'PoliController@index')->name('poli');

Route::get('/spesialis', 'SpesialisController@index')->name('spesialis');
