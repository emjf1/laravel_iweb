<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regimen extends Model
{
    public $timestamps = false;

    protected $fillable = ('codigo', 'regimen', 'porcentaje');

    public function reservas(){
        return $this->hasMany('App\Reserva');
    }
}
