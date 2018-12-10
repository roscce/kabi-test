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
    return view('domov');

});

//ko kliknes na gumb več o izdelku te pošlje sem

Route::get('/izdelek/{id}', function ($id) {
    return view('izdelek', ['id_iz' => $id]);

});
