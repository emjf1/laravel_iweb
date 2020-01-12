<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $fillable = ('codigo', 'url');

    public function habitacion(){
        return $this->hasMany('App\Habitacion');
    }
}
