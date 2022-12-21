<?php

use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
// 	return $request->user();
// });

Route::post('/getPoli', 'PoliController@index')->name('poli');
Route::post('/getJamKerjaPoli', 'PoliController@jamKerja')->name('jam-kerja-poli');
Route::post('/getJadwalPoli', 'PoliController@jadwal')->name('jadwal-poli');

Route::prefix('dokter')->name('dokter.')->group(function () {
	Route::post('getListDokter', 'DokterController@index')->name('listDokter');
	Route::post('checkDokterExists', 'DokterController@checkDokterExists')->name('checkDokterExists');
});

Route::prefix('appointment')->name('appointment.')->group(function () {
	Route::post('checkNomorRekamMedis', 'AppointmentController@checkNomorRekamMedis')->name('checkNomorRekamMedis');
	Route::post('checkTglPemesanan', 'AppointmentController@checkTglPemeriksaan')->name('checkTglPemeriksaan');
	Route::post('setAppointment', 'AppointmentController@store')->name('store');
	Route::post('ticket/email', 'AppointmentController@sendEmailTicket')->name('sendEmailTicket');
});
