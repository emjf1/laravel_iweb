<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = ('codigo', 'fecha_inicio', 'fecha_fin', 'descripcion');
}
