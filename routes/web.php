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
Route::get('/data-pemohon', function () {
    return view('data-skm');
})->name('data-pemohon');
Route::get('/form-skm', function () {
    return view('form-skm');
})->name('form-skm');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
