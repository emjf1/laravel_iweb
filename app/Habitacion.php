<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table = "Habitacion";

    public $timestamps = false;

    protected $fillable = array('codigo', 'descripcion', 'vistas', 'plazas', 'superficie', 'precio', 'categoria', 'wifi');

    public function reservas(){
        return $this->hasMany('App\Reserva');
    }

    public function habitacionImagen(){
            return $this->belongsTo('App\Imagen');
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
        $habitacion->save();
        return $habitacion;
    }

    public function actualizar(array $data, Habitacion $habitacion){
        $habitacion->update($data);
        return $habitacion;
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
}
