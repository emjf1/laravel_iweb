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
        return Habitacion::All();;
    }

    public static function mostrarHabitacion(String $id){
        return DB::table('Habitacion')->where('codigo', $id)->first();
    }

    public static function crearHabitacion(array $data){
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

    public static function actualizarHabitacion(array $data, String $id){
        DB::table('Habitacion')
            ->where('codigo', $id)
            ->update($data);
        return DB::table('Habitacion')->where('codigo', $data['codigo'])->first();
    }

    public static function borrarHabitacion(String $id){
        return DB::table('Habitacion')->where('codigo', $id)->delete();
    }

    public static function obtenerImagenHabitacion(String $id){
       return DB::table('Habitacion')
            ->join('Imagen', 'Habitacion.codigo', '=', 'Imagen.habitacion')
            ->where('Habitacion.codigo',$id)
            ->select('Imagen.codigo','Imagen.url')
            ->get();
    }
}
