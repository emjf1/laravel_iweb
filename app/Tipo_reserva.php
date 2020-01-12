<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_reserva extends Model
{
    protected $fillable = ('codigo', 'tipo');

    public function reservas(){
        return $this->hasMany('App\Reserva');
    }
}
