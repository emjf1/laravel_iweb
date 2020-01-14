<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = "Imagen";

    public $timestamps = false;

    protected $fillable = array('codigo', 'url');

    public function habitacion(){
        return $this->hasMany('App\Habitacion');
    }

    public static function crear(array $data){
        $imagen = new Imagen();
        $imagen->codigo = $data['codigo'];
        $imagen->url = $data['url'];
        $imagen->habitacion = $data['habitacion'];
        $imagen->save();
        return $imagen;
    }

    public function actualizar(array $data, Imagen $imagen){
        $imagen->update($data);
        return $imagen;
    }

    public function borrar(array $data, Imagen $imagen){
        if($imagen->delete($data))
            return true;
        else
            return false;
    }

    public static function leer(Imagen $data){
        $imagen = Imagen::where('codigo', '=', $data->codigo);
        return $imagen;
    }
}
