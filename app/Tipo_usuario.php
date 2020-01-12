<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_usuario extends Model
{
    public function users(){
        return $this->hasMany('App\Usuario');
    }

    
}
