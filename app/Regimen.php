<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regimen extends Model
{
    protected $fillable = ('codigo', 'regimen', 'porcentaje');

    public function reservas(){
        return $this->hasMany('App\Reserva');
    }
}
