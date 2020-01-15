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
Route::get('/habitaciones', 'HabitacionController@listaHabitacion')->name('habitaciones.lista');
Route::get('/habitaciones/{id}', 'HabitacionController@detalleHabitacion')->name('habitaciones.detalle');
Route::get('/habitaciones/{id}/fotos', 'HabitacionController@fotosHabitacion')->name('habitaciones.detalle.fotos');
Route::post('/habitaciones', 'HabitacionController@crearHabitacion')->name('habitaciones.crear'); 
Route::put('/habitaciones/{id}', 'HabitacionController@editarHabitacion')->name('habitaciones.editar'); 
Route::delete('/habitaciones/{id}', 'HabitacionController@eliminarHabitacion')->name('habitaciones.borrar'); 

// Usuario
Route::get('/login', 'UsuarioController@login'); //Middleware
Route::get('/registro', 'UsuarioController@registro'); //Middleware
Route::get('/usuario/{userID}', 'UsuarioController@infoUsuario'); //Middleware
Route::put('/usuario/{userID}', 'UsuarioController@editarUsuario'); //Middleware
Route::delete('/usuario/{userID}', 'UsuarioController@eliminarUsuario'); //Middleware


// Tipo de Usuario
Route::get('/tipousuario', 'TipoUsuarioController@listarTipoUsuario');
Route::get('/blanco', 'TipoUsuarioController@blanco');
Route::post('/tipousuario', 'TipoUsuarioController@crearTipoUsuario');
Route::get('/tipousuario/{id}', 'TipoUsuarioController@detalleTipoUsuario');
Route::put('/tipousuario/{id}', 'TipoUsuarioController@editarTipoUsuario');
Route::delete('/tipousuario/{id}', 'TipoUsuarioController@eliminarTipoUsuario');
