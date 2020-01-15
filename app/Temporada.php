<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    protected $table = "Temporada";

    public $timestamps = false;

    protected $fillable = array('id', 'temporada', 'fecha_inicio', 'fecha_fin', 'porcentaje');

    public static function crearTemporada(array $data){
        $temporada = new Temporada();
        $temporada->id = $data['id'];
        $temporada->temporada = $data['temporada'];
        $temporada->fecha_inicio = $data['fecha_inicio'];
        $temporada->fecha_fin = $data['fecha_fin'];
        $temporada->porcentaje = $data['porcentaje'];
        $temporada->save();
        return $temporada;
    }

    public function actualizarTemporada(array $data, Temporada $temporada){
        DB::table('Temporada')
            ->where('codigo', $temporada->codigo)
            ->update($data);

        $temporadaActualizada = DB::table('Temporada')->where('codigo', $data['codigo'])->first();
        return $temporadaActualizada;
    }

    public function borrarTemporada(Temporada $temporada){
        if(DB::table('Temporada')->where('codigo', $temporada->codigo)->delete())
            return true;
        else
            return false;
    }

    public static function mostrarTemporada(Temporada $data){
        $temporada = Temporada::where('id', '=', $data->id);
        return $temporada;
    }

}
