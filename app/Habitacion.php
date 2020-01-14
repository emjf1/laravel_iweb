<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    public $timestamps = false;

    protected $fillable = ('codigo', 'descripcion', 'vistas', 'plazas', 'superficie', 'precio', 'categoria', 'wifi');

    public function reservas(){
        return $this->hasMany('App\Reserva');
    }

    public function habitacionImagen(){
            return $this->belongsTo('App\Imagen');
    }
}
