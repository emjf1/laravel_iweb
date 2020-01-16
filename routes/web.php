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

// Habitacion
Route::get('/habitaciones', 'HabitacionController@listaHabitacion')->name('habitaciones.lista');
Route::get('/habitaciones/{id}', 'HabitacionController@detalleHabitacion')->name('habitaciones.detalle');
Route::get('/habitaciones/{id}/fotos', 'HabitacionController@fotosHabitacion')->name('habitaciones.detalle.fotos');
Route::post('/habitaciones', 'HabitacionController@crearHabitacion')->name('habitaciones.crear');
Route::put('/habitaciones/{id}', 'HabitacionController@editarHabitacion')->name('habitaciones.editar');
Route::delete('/habitaciones/{id}', 'HabitacionController@eliminarHabitacion')->name('habitaciones.borrar');

// Imagen
Route::get('/imagen/{id}', 'ImagenController@detalleImagen')->name('imagen.detalle');
Route::post('/imagen', 'ImagenController@crearImagen')->name('imagen.crear');
Route::put('/imagen/{id}', 'ImagenController@editarImagen')->name('imagen.editar');
Route::delete('/imagen/{id}', 'ImagenController@eliminarImagen')->name('imagen.borrar');

// Regimen
Route::get('/regimen', 'RegimenController@listaRegimen')->name('regimen.lista');
Route::get('/regimen/{id}', 'RegimenController@detalleRegimen')->name('regimen.detalle');
Route::post('/regimen', 'RegimenController@crearRegimen')->name('regimen.crear');
Route::put('/regimen/{id}', 'RegimenController@editarRegimen')->name('regimen.editar');
Route::delete('/regimen/{id}', 'RegimenController@eliminarRegimen')->name('regimen.borrar');

// Reserva
Route::get('/reservas', 'ReservaController@listaReserva')->name('reservas.lista');
Route::get('/reservasusuario', 'ReservaController@listaReservaUsuario')->name('reservas.lista.usuario');
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

// Temporada
Route::get('/temporada', 'TemporadaController@listaTemporada')->name('temporada.lista');
Route::get('/temporada/{id}', 'TemporadaController@detalleTemporada')->name('temporada.detalle');
Route::post('/temporada', 'TemporadaController@crearTemporada')->name('temporada.crear');
Route::put('/temporada/{id}', 'TemporadaController@editarTemporada')->name('temporada.editar');
Route::delete('/temporada/{id}', 'TemporadaController@eliminarTemporada')->name('temporada.borrar');

// Tipo de Reserva
Route::get('/tiporeserva', 'TipoReservaController@listaTipoReserva')->name('tiporeserva.lista');
Route::get('/tiporeserva/{id}', 'TipoReservaController@detalleTipoReserva')->name('tiporeserva.detalle');
Route::post('/tiporeserva', 'TipoReservaController@crearTipoReserva')->name('tiporeserva.crear');
Route::put('/tiporeserva/{id}', 'TipoReservaController@editarTipoReserva')->name('tiporeserva.editar');
Route::delete('/tiporeserva/{id}', 'TipoReservaController@eliminarTipoReserva')->name('tiporeserva.borrar');

// Tipo de Usuario
Route::get('/tipousuario', 'TipoUsuarioController@listaTipoUsuario')->name('tipousuario.lista');
Route::get('/tipousuario/{id}', 'TipoUsuarioController@detalleTipoUsuario')->name('tipousuario.detalle');
Route::post('/tipousuario', 'TipoUsuarioController@crearTipoUsuario')->name('tipousuario.crear');
Route::put('/tipousuario/{id}', 'TipoUsuarioController@editarTipoUsuario')->name('tipousuario.editar');
Route::delete('/tipousuario/{id}', 'TipoUsuarioController@eliminarTipoUsuario')->name('tipousuario.borrar');

// Usuario
Route::get('/usuarios', 'UsuarioController@listaUsuario')->name('usuarios.lista');
Route::get('/perfil', 'UsuarioController@infoUsuario')->name('usuarios.detalle');
Route::post('/usuarios', 'UsuarioController@crearUsuario')->name('usuarios.crear');
Route::put('/usuarios/{userID}', 'UsuarioController@editarUsuario')->name('usuarios.editar');
Route::delete('/usuarios/{userID}', 'UsuarioController@eliminarUsuario')->name('usuarios.borrar');


// Autenticacion (Login Token JWT)
Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('/login', 'AuthController@login')->name('login');
    Route::post('/logout', 'AuthController@logout')->name('logout');
    Route::post('/refresh', 'AuthController@refresh')->name('refresh');
    Route::post('/me', 'AuthController@me')->name('me');
});