<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'DashboardController@index');
Route::get('/pra-evaluasi', 'PraEvaluasiController@index');
Route::get('/pra-evaluasi/{keyTahun}', 'PraEvaluasiController@show');
Route::get('/pra-evaluasi/liveSearch/{key}', 'PraEvaluasiController@liveSearch');
Route::get('/pra-evaluasi/PDF/{keyTahun}', 'PraEvaluasiController@cetak_pdf');
Route::get('/evaluasi', 'EvaluasiController@index');
Route::get('/evaluasi/dataPribadi', 'DetailMahasiswaController@index');
Route::get('/evaluasi/dataAkademik', 'DetailMahasiswaController@dataAkademik');
Route::post('/evaluasi/delete/{id}', 'EvaluasiController@destroy');