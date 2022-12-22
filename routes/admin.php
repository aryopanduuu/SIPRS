<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');
});

Route::middleware(['auth'])->group(function () {
	Route::get('logout', 'Auth\LoginController@logout')->name('logout');
	Route::get('/', 'HomeController@index')->name('index');

	Route::middleware(['role:super_admin'])->group(function () {
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

		Route::prefix('dokter')->name('dokter.')->group(function () {
			Route::get('/', 'DokterController@index')->name('index');
			Route::get('tambah', 'DokterController@create')->name('create');
			Route::post('tambah', 'DokterController@store')->name('store');
			Route::get('ubah/{id}', 'DokterController@edit')->name('edit');
			Route::patch('ubah/{id}', 'DokterController@update')->name('update');

			Route::prefix('{id}/spesialis')->name('spesialis.')->group(function () {
				Route::get('/', 'DokterSpesialisController@index')->name('index');
				Route::get('/tambah', 'DokterSpesialisController@create')->name('create');
				Route::post('/tambah', 'DokterSpesialisController@store')->name('store');
				Route::delete('/{spesialis_id}/hapus', 'DokterSpesialisController@destroy')->name('destroy');
			});
		});

		Route::prefix('jadwal/harian')->name('jadwal-harian.')->group(function () {
			Route::get('/', 'JadwalHarianController@index')->name('index');
			Route::get('ubah/{id}', 'JadwalHarianController@edit')->name('edit');
			Route::patch('ubah/{id}', 'JadwalHarianController@update')->name('update');
			Route::get('{id}/jam-kerja', 'JadwalHarianController@show')->name('show');
		});

		Route::prefix('kontak')->name('kontak.')->group(function () {
			Route::get('/', 'KontakController@index')->name('index');
			Route::get('ubah/{id}', 'KontakController@edit')->name('edit');
			Route::patch('ubah/{id}', 'KontakController@update')->name('update');
		});

		Route::prefix('admin')->name('admin.')->group(function () {
			Route::get('/', 'AdminController@index')->name('index');
			Route::get('/tambah', 'AdminController@create')->name('create');
			Route::post('/tambah', 'AdminController@store')->name('store');
			Route::get('ubah/{id}', 'AdminController@edit')->name('edit');
			Route::patch('ubah/{id}', 'AdminController@update')->name('update');
		});

		Route::prefix('pengaturan')->name('pengaturan.')->group(function () {
			Route::get('/', 'PengaturanController@index')->name('index');
			Route::get('ubah', 'PengaturanController@edit')->name('edit');
			Route::patch('ubah', 'PengaturanController@update')->name('update');
		});
	});

	Route::prefix('pendaftaran-online')->name('pendaftaran-online.')->group(function () {
		Route::get('/', 'AppointmentController@index')->name('index');
		Route::get('ubah/{id}', 'AppointmentController@edit')->name('edit');
		Route::patch('ubah/{id}', 'AppointmentController@update')->name('update');
		Route::get('{id}/tiket', 'AppointmentController@show')->name('show');
	});
});
