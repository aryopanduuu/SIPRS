<?php

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
	Route::get('ticket/print/{id}', 'AppointmentController@print')->name('print');
	Route::post('ticket/pdf/{id}', 'AppointmentController@pdf')->name('pdf');
	Route::get('ticket/qrcode/{id}', 'AppointmentController@qrcode')->name('qrcode');
	Route::get('ticket/whatsapp/{id}', 'AppointmentController@whatsapp')->name('whatsapp');
	Route::prefix('pasien-lama')->name('pasien-lama.')->group(function () {
		Route::get('/', 'AppointmentController@pasienLama')->name('index');
		Route::post('/', 'AppointmentController@checkNomorRekamMedis')->name('search');
	});
});

Route::get('/poli', 'PoliController@index')->name('poli');

Route::get('/spesialis', 'SpesialisController@index')->name('spesialis');

Route::get('/kontak', function() {
    return view('pages.kontak');
})->name('kontak');

Route::get('/dokter', 'DokterController@index')->name('dokter');
