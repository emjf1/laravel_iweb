<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala_conferencia extends Model
{
    protected $table = "Sala_conferencia";

    public $timestamps = false;

    protected $fillable = ('codigo', 'descripcion', 'proyector', 'microfono', 'pizarra', 'mesas', 'asientos');

    public function reservas(){
        return $this->hasMany('App\Reserva');
    }
}
