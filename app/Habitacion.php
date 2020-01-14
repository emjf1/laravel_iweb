<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Habitacion extends Model
{
    protected $table = "Habitacion";

    public $timestamps = false;

    protected $fillable = array('codigo', 'descripcion', 'vistas', 'plazas', 'superficie', 'precio', 'categoria', 'wifi', 'puntuacion');

    public function reservas(){
        return $this->hasMany('App\Reserva');
    }

    public function habitacionImagen(){
            return $this->belongsTo('App\Imagen');
    }

    public static function listarHabitaciones(){
        $habitaciones = Habitacion::All();
        return $habitaciones;
    }

    public static function mostrarHabitacion(Habitacion $data){
        $habitacion = DB::table('Habitacion')->where('codigo', $data->codigo)->first();
        return $habitacion;
    }

    public static function crear(array $data){
        $habitacion = new Habitacion();
        $habitacion->codigo = $data['codigo'];
        $habitacion->descripcion = $data['descripcion'];
        $habitacion->vistas = $data['vistas'];
        $habitacion->plazas = $data['plazas'];
        $habitacion->superficie = $data['superficie'];
        $habitacion->precio = $data['precio'];
        $habitacion->categoria = $data['categoria'];
        $habitacion->wifi = $data['wifi'];
        $habitacion->puntuacion = $data['puntuacion'];
        $habitacion->save();
        return $habitacion;
    }

    public function actualizar(array $data, Habitacion $habitacion){
        $habitacionActualizada = DB::table('Habitacion')->where('codigo', $habitacion->codigo)->first();
        $habitacionActualizada->update($data);
        return $habitacionActualizada;
    }

    public function borrar(array $data, Habitacion $habitacion){
        if($habitacion->delete($data))
            return true;
        else
            return false;
    }

    public static function leer(Habitacion $data){
        $habitacion = Habitacion::where('codigo', '=', $data->codigo);
        return $habitacion;
    }

    public static function obtenerImagenHabitacion(Habitacion $data){
        $habitacion = Habitacion::where('codigo', '=', $data->codigo);
        return $habitacion->habitacionImagen;
    }
}
