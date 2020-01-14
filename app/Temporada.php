<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    public $timestamps = false;

    protected $fillable = ('id', 'temporada', 'fecha_inicio', 'fecha_fin', 'porcentaje');
}
