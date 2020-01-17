<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Temporada extends Model
{
    protected $table = "Temporada";

    public $timestamps = false;

    protected $fillable = array('id', 'temporada', 'fecha_inicio', 'fecha_fin', 'porcentaje');

    public static function crearTemporada(array $data){
        $temporada = new Temporada();
        $temporada->temporada = $data['temporada'];
        $temporada->fecha_inicio = $data['fecha_inicio'];
        $temporada->fecha_fin = $data['fecha_fin'];
        $temporada->porcentaje = $data['porcentaje'];
        $temporada->save();
        return $temporada;
    }

    public static function listarTemporada(){
        return Temporada::All();
    }

    public static function actualizarTemporada(array $data, String $id){
        DB::table('Temporada')
            ->where('id', $id)
            ->update($data);
        return DB::table('Temporada')->where('id', $data['id'])->first();
    }

    public static function borrarTemporada(String $id){
        return DB::table('Temporada')->where('id', $id)->delete();
    }

    public static function mostrarTemporada(String $id){
        return DB::table('Temporada')->where('id', $id)->first();
    }
}
