<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    protected $table = "Temporada";

    public $timestamps = false;

    protected $fillable = array('id', 'temporada', 'fecha_inicio', 'fecha_fin', 'porcentaje');

    public static function crear(array $data){
        $temporada = new Temporada();
        $temporada->id = $data['id'];
        $temporada->temporada = $data['temporada'];
        $temporada->fecha_inicio = $data['fecha_inicio'];
        $temporada->fecha_fin = $data['fecha_fin'];
        $temporada->porcentaje = $data['porcentaje'];
        $temporada->save();
        return $temporada;
    }

    public function actualizar(array $data, Temporada $temporada){
        $temporada->update($data);
        return $temporada;
    }

    public function borrar(array $data, Temporada $temporada){
        if($temporada->delete($data))
            return true;
        else
            return false;
    }

    public static function leer(Temporada $data){
        $temporada = Temporada::where('id', '=', $data->id);
        return $temporada;
    }

}
