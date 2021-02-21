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

Route::get('/', function () {
    return view('welcome', ['title' => 'Belajar Laravel']);
});

Route::get('home', function() {
    return view('home');
});

Route::get('edulevels', 'EdulevelController@data');//tampil data
Route::get('edulevels/add', 'EdulevelController@add');//tampil form add
Route::post('edulevels', 'EdulevelController@addProcess');//proses tambah data
Route::get('edulevels/edit/{id}', 'EdulevelController@edit');//tampil form edit
Route::patch('edulevels/{id}', 'EdulevelController@editProcess');//proses edit data, bisa patch bisa put