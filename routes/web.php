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
Route::get('/salas', 'SalaController@listaSala')->name('salas.lista');
Route::get('/salas/{id}', 'SalaController@detalleSala')->name('salas.detalle');
Route::get('/salas/{id}/fotos', 'SalaController@fotosSala')->name('salas.detalle.fotos');
Route::post('/salas', 'SalaController@crearSala')->name('salas.crear');
Route::put('/salas/{id}', 'SalaController@editarSala')->name('salas.editar'); 
Route::delete('/salas/{id}', 'SalaController@eliminarSala')->name('salas.borrar'); 

// Habitacion
Route::get('/habitaciones', 'HabitacionController@listaHabitacion')->name('habitaciones.lista');
Route::get('/habitaciones/{id}', 'HabitacionController@detalleHabitacion')->name('habitaciones.detalle');
Route::get('/habitaciones/{id}/fotos', 'HabitacionController@fotosHabitacion')->name('habitaciones.detalle.fotos');
Route::post('/habitaciones', 'HabitacionController@crearHabitacion')->name('habitaciones.crear'); 
Route::put('/habitaciones/{id}', 'HabitacionController@editarHabitacion')->name('habitaciones.editar'); 
Route::delete('/habitaciones/{id}', 'HabitacionController@eliminarHabitacion')->name('habitaciones.borrar'); 

// Usuario
Route::get('/login', 'UsuarioController@login')->name('usuarios.login'); 
Route::get('/registro', 'UsuarioController@registro')->name('usuarios.registro'); 
Route::get('/usuarios', 'UsuarioController@listaUsuario')->name('usuarios.lista');
Route::get('/usuarios/{userID}', 'UsuarioController@infoUsuario')->name('usuarios.detalle'); 
Route::post('/usuarios', 'UsuarioController@crearUsuario')->name('usuarios.crear'); 
Route::put('/usuarios/{userID}', 'UsuarioController@editarUsuario')->name('usuarios.editar'); 
Route::delete('/usuarios/{userID}', 'UsuarioController@eliminarUsuario')->name('usuarios.borrar'); 


// Tipo de Usuario
Route::get('/tipousuario', 'TipoUsuarioController@listarTipoUsuario');
Route::get('/blanco', 'TipoUsuarioController@blanco');
Route::post('/tipousuario', 'TipoUsuarioController@crearTipoUsuario');
Route::get('/tipousuario/{id}', 'TipoUsuarioController@detalleTipoUsuario');
Route::put('/tipousuario/{id}', 'TipoUsuarioController@editarTipoUsuario');
Route::delete('/tipousuario/{id}', 'TipoUsuarioController@eliminarTipoUsuario');

