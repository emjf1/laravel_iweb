<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public function tipo_usuario(){
        return $this->belongsTo('App\Tipo_usuario');
    }
}
