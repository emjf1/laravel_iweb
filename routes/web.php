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

Route::get('/habitaciones', 'HabitacionController@listaHabitacion')->name('habitaciones.lista');
Route::get('/habitaciones/{id}', 'HabitacionController@detalleHabitacion')->name('habitaciones.detalle');
Route::get('/habitaciones/{id}/fotos', 'HabitacionController@fotosHabitacion')->name('habitaciones.detalle.fotos');

Route::get('/imagen', 'ImagenController@listaImagen')->name('imagen.lista');
Route::get('/imagen/{id}', 'ImagenController@detalleImagen')->name('imagen.detalle');

Route::get('/regimen', 'RegimenController@listaRegimen')->name('regimen.lista');
Route::get('/regimen/{id}', 'RegimenController@detalleRegimen')->name('regimen.detalle');

Route::get('/salas', 'SalaController@listaSala')->name('salas.lista');
Route::get('/salas/{id}', 'SalaController@detalleSala')->name('salas.detalle');
Route::get('/salas/{id}/fotos', 'SalaController@fotosSala')->name('salas.detalle.fotos');

Route::get('/temporada', 'TemporadaController@listaTemporada')->name('temporada.lista');
Route::get('/temporada/{id}', 'TemporadaController@detalleTemporada')->name('temporada.detalle');

Route::get('/tiporeserva', 'Tipo_reservaController@listaTipoReserva')->name('tiporeserva.lista');
Route::get('/tiporeserva/{id}', 'Tipo_reservaController@detalleTipoReserva')->name('tiporeserva.detalle');

Route::get('/tipousuario', 'TipoUsuarioController@listaTipoUsuario')->name('tipousuario.lista');
Route::get('/tipousuario/{id}', 'TipoUsuarioController@detalleTipoUsuario')->name('tipousuario.detalle');

Route::get('/usuarios', 'UsuarioController@listaUsuario')->name('usuarios.lista');

Route::post('/registro', 'UsuarioController@register')->name('register');
Route::post('/login', 'AuthController@login')->name('login');


// Autenticacion (Login Token JWT)
Route::group(['middleware' => ['jwt']], function() {

    Route::post('/logout', 'AuthController@logout')->name('logout');
    Route::post('/refresh', 'AuthController@refresh')->name('refresh');
    Route::get('/perfil', 'AuthController@me')->name('perfil');

    Route::post('/usuarios', 'UsuarioController@crearUsuario')->name('usuarios.crear');
    Route::put('/editarPerfil', 'UsuarioController@editarUsuario')->name('usuarios.editar');
    Route::delete('/usuarios/{userID}', 'UsuarioController@eliminarUsuario')->name('usuarios.borrar');

    Route::post('/tipousuario', 'TipoUsuarioController@crearTipoUsuario')->name('tipousuario.crear');
    Route::put('/tipousuario/{id}', 'TipoUsuarioController@editarTipoUsuario')->name('tipousuario.editar');
    Route::delete('/tipousuario/{id}', 'TipoUsuarioController@eliminarTipoUsuario')->name('tipousuario.borrar');

    Route::post('/tiporeserva', 'Tipo_reservaController@crearTipoReserva')->name('tiporeserva.crear');
    Route::put('/tiporeserva/{id}', 'Tipo_reservaController@editarTipoReserva')->name('tiporeserva.editar');
    Route::delete('/tiporeserva/{id}', 'Tipo_reservaController@eliminarTipoReserva')->name('tiporeserva.borrar');

    Route::post('/temporada', 'TemporadaController@crearTemporada')->name('temporada.crear');
    Route::put('/temporada/{id}', 'TemporadaController@editarTemporada')->name('temporada.editar');
    Route::delete('/temporada/{id}', 'TemporadaController@eliminarTemporada')->name('temporada.borrar');

    Route::post('/salas', 'SalaController@crearSala')->name('salas.crear');
    Route::put('/salas/{id}', 'SalaController@editarSala')->name('salas.editar');
    Route::delete('/salas/{id}', 'SalaController@eliminarSala')->name('salas.borrar');

    Route::post('/reservas', 'ReservaController@crearReserva')->name('reservas.crear');
    Route::put('/reservas/{id}', 'ReservaController@editarReserva')->name('reservas.editar');
    Route::delete('/reservas/{id}', 'ReservaController@eliminarReserva')->name('reservas.borrar');

    Route::post('/regimen', 'RegimenController@crearRegimen')->name('regimen.crear');
    Route::put('/regimen/{id}', 'RegimenController@editarRegimen')->name('regimen.editar');
    Route::delete('/regimen/{id}', 'RegimenController@eliminarRegimen')->name('regimen.borrar');

    Route::post('/habitaciones', 'HabitacionController@crearHabitacion')->name('habitaciones.crear');
    Route::put('/habitaciones/{id}', 'HabitacionController@editarHabitacion')->name('habitaciones.editar');
    Route::delete('/habitaciones/{id}', 'HabitacionController@eliminarHabitacion')->name('habitaciones.borrar');

    Route::post('/imagen', 'ImagenController@crearImagen')->name('imagen.crear');
    Route::put('/imagen/{id}', 'ImagenController@editarImagen')->name('imagen.editar');
    Route::delete('/imagen/{id}', 'ImagenController@eliminarImagen')->name('imagen.borrar');

    Route::get('/reservas', 'ReservaController@listaReserva')->name('reservas.lista');
    Route::get('/reservasusuario', 'ReservaController@listaReservaUsuario')->name('reservas.lista.usuario');
    Route::get('/reservasusuario/{id}', 'ReservaController@listaReservaAdminUsuario')->name('reservas.lista.admin.usuario');
    Route::get('/reservas/{id}', 'ReservaController@detalleReserva')->name('reservas.detalles');
    Route::get('/perfil/reservas', 'ReservaController@listaReservasUsuario')->name('reservas.usuario.lista');
    Route::get('/reservasDisponibles', 'ReservaController@mostrarDisponibles')->name('reservas.disponibles');
    Route::post('/precioReserva', 'ReservaController@calcularPrecio')->name('reservas.precio');
});
