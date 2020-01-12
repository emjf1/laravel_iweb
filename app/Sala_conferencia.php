<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala_conferencia extends Model
{
    protected $fillable = ('codigo', 'descripcion', 'proyector', 'microfono', 'pizarra', 'mesas', 'asientos');
}
