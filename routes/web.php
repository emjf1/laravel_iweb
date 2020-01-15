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


// Reserva
Route::get('/reservas', 'ReservaController@listaReserva')->name('reservas.lista');
Route::get('/reservas/{id}', 'ReservaController@detalleReserva')->name('reservas.detalles');
Route::get('/perfil/reservas', 'ReservaController@listaReservasUsuario')->name('reservas.usuario.lista');
Route::post('/reservas', 'ReservaController@crearReserva')->name('reservas.crear');
Route::put('/reservas/{id}', 'ReservaController@editarReserva')->name('reservas.editar');
Route::delete('/reservas/{id}', 'ReservaController@eliminarReserva')->name('reservas.borrar');

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
Route::get('/perfil', 'UsuarioController@infoUsuario')->name('usuarios.detalle');
Route::post('/usuarios', 'UsuarioController@crearUsuario')->name('usuarios.crear');
Route::put('/usuarios/{userID}', 'UsuarioController@editarUsuario')->name('usuarios.editar');
Route::delete('/usuarios/{userID}', 'UsuarioController@eliminarUsuario')->name('usuarios.borrar');


// Tipo de Usuario
Route::get('/tipousuario', 'TipoUsuarioController@listaTipoUsuario')->name('tipousuario.lista');
Route::get('/tipousuario/{id}', 'TipoUsuarioController@detalleTipoUsuario')->name('tipousuario.detalle');
Route::post('/tipousuario', 'TipoUsuarioController@crearTipoUsuario')->name('tipousuario.crear');
Route::put('/tipousuario/{id}', 'TipoUsuarioController@editarTipoUsuario')->name('tipousuario.editar');
Route::delete('/tipousuario/{id}', 'TipoUsuarioController@eliminarTipoUsuario')->name('tipousuario.borrar');

// Regimen
