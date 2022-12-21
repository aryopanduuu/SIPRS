<?php

use App\Http\Controllers\poliController;
use App\Http\Controllers\SpesialisController;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('pages.index');
})->name('home');

Route::get('/tentang', function () {
	return view('pages.tentang');
})->name('tentang');

Route::prefix('appointment')->name('appointment.')->group(function () {
	Route::get('/', 'AppointmentController@index')->name('index');
	Route::post('/', 'AppointmentController@checkNomorRekamMedis')->name('search');
});

Route::get('/poli', 'PoliController@index')->name('poli');

Route::prefix('spesialis')->name('spesialis.')->group(function () {
	Route::get('/', 'SpesialisController@index')->name('index');
	Route::get('{id}/detail', 'SpesialisController@show')->name('show');
	route::get('{id}/edit', 'SpesialisController@edit')->name('edit');
	route::get('{id}/delete', 'SpesialisController@delete')->name('delete');
});
// Route::get('/spesialisdetail', 'SpesialisController@show')->name('spesialisdetail');

Route::get('/spesialisdetail', function () {
	return view('pages.spesialisdetails');
})->name('spesialisdetail');


// Route::get('/spesialisdetail', [SpesialisController::class, 'showspesial']);
