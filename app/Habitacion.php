<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $fillable = ('codigo', 'descripcion', 'vistas', 'plazas', 'superficie', 'precio', 'categoria', 'wifi');
}
