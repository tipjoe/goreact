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

Route::get('/', 'FileUploadController@index')->name('front');

Route::post('/', 'FileUploadController@store')->name('upload.file');

Route::get('/file/{id}', 'FileUploadController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
