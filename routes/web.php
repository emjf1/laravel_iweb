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
});
Route::get('/prueba', 'PruebaController@list');

// Regimen
Route::get('/regimenes', 'RegimenController@listaRegimen');

// Reserva
Route::get('/reservas', 'ReservaController@listaReserva'); //Middleware
Route::get('/usuario/{userID}/reservas', 'ReservaController@listaReservasUsuario'); //Middleware

// Sala
Route::get('/salas', 'SalaController@listaSala'); 
Route::get('/salas/{id}', 'SalaController@detalleSala'); 
Route::get('/salas/{id}/imagenes', 'SalaController@listaFotoSala');
Route::put('/salas/{id}', 'SalaController@editarSala'); //Middleware
Route::delete('/salas/{id}', 'SalaController@eliminarSala'); //Middleware

// Habitacion
Route::get('/habitaciones', 'HabitacionController@listaHabitacion'); 
Route::get('/habitaciones/{id}', 'HabitacionController@detalleHabitacion'); 
Route::get('/habitaciones/{id}', 'HabitacionController@listaFotoHabitacion'); 
Route::put('/habitaciones/{id}', 'HabitacionController@editarHabitacion'); //Middleware
Route::delete('/habitaciones/{id}', 'HabitacionController@eliminarHabitacion'); //Middleware

// Usuario
Route::get('/login', 'UsuarioController@login'); //Middleware
Route::get('/registro', 'UsuarioController@registro'); //Middleware
Route::get('/usuario/{userID}', 'UsuarioController@infoUsuario'); //Middleware
Route::put('/usuario/{userID}', 'UsuarioController@editarUsuario'); //Middleware
Route::delete('/usuario/{userID}', 'UsuarioController@eliminarUsuario'); //Middleware


// Tipo de Usuario
Route::get('/usuario/tipo', 'TipoUsuarioController@listaTipoUsuario'); 
Route::post('/usuario/tipo', 'TipoUsuarioController@crearTipoUsuario'); 
Route::get('/usuario/tipo/{id}', 'TipoUsuarioController@detalleTipoUsuario'); 
Route::put('/usuario/tipo/{id}', 'TipoUsuarioController@editarTipoUsuario'); 
Route::delete('/usuario/tipo/{id}', 'TipoUsuarioController@eliminarTipoUsuario'); 