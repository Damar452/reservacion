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


Auth::routes();

Route::resource('/', 'SolicitudController');
Route::resource('reservas', 'SolicitudController');
Route::resource('aprobadas', 'AprobadasController');
Route::get('/search','SolicitudController@show');


Route::group(['middleware' => 'admin'], function () {
    Route::resource('usuario', 'UserController');
    Route::resource('rechazadas', 'RechazadasController');
    Route::resource('pendientes', 'PendientesController');
    Route::resource('admin', 'AdminController');
  
});

// Route::resource('excel', 'AdminController@store');

// ->middleware(['auth', 'password.confirm'])

// Route::resource('prueba', 'SedeAController');