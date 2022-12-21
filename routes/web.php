<?php

use Illuminate\Support\Facades\Auth;
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
	Route::post('ticket/konfirmasiPembayaran', 'AppointmentController@store');
	Route::prefix('pasien-lama')->name('pasien-lama.')->group(function () {
		Route::get('/', 'AppointmentController@pasienLama')->name('index');
		Route::post('/', 'AppointmentController@checkNomorRekamMedis')->name('search');
	});

	Route::get('/cetak-ulang', 'CetakUlangController@index')->name('cetak-ulang');
	Route::post('/cetak-ulang', 'CetakUlangController@show');
});

Route::get('/poli', 'PoliController@index')->name('poli');

Route::prefix('spesialis')->name('spesialis.')->group(function () {
	Route::get('/', 'SpesialisController@index')->name('index');
	Route::get('{id}/detail', 'SpesialisController@show')->name('show');
});

Route::get('/kontak', 'KontakController@index')->name('kontak');

Route::prefix('dokter')->name('dokter.')->group(function () {
	Route::get('/', 'DokterController@index')->name('index');
	Route::get('{id}', 'DokterController@show')->name('show');
});
