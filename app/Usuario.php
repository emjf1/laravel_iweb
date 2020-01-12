<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    protected $fillable = ('email', 'nombre', 'apellidos', 'telefono', 'direccion', 'contraseña', 'foto_perfil', 'DNI', 'nacionalidad');

    public function tipo_usuario(){
        return $this->belongsTo('App\Tipo_usuario');
    }
}
