<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/data-pemohon','SkmController@getdata')->name('data-pemohon');
Route::get('/data-pemohon-manual', function () {
    return view('data-skm-manual');
})->name('data-pemohon-manual');
Route::post('/form-skm','SkmController@storeDataUser')->name('form-skm');
Route::get('/pertanyaan','SkmController@getPertanyaan')->name('get-pertanyaan');
Route::post('/form-data-skm','SkmController@storeDataSKM')->name('form-data-skm');
Route::get('/result-skm','SkmController@getResultSKM')->name('result-skm');
Route::get('/nilai-skm','SkmController@getTotalSKM')->name('total-skm');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    //Custom
    //Route::get('rekap-bulanan', ['uses'=>'RekapPerTahun@rekapBulanan', 'as'=>'rekapbulanan.data']);
    Route::resource('rekap-pertahun', 'RekapPerTahun');
    Route::resource('rekap-data-skm', 'RekapDataSKMController');
    Route::resource('publikasi', 'PublikasiController');
});
