<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Regimen extends Model
{
    protected $table = "Regimen";

    public $timestamps = false;

    protected $fillable = array('codigo', 'regimen', 'porcentaje', 'es_sala');

    public function reservas(){
        return $this->hasMany('App\Reserva');
    }

    public static function crearRegimen(array $data){
        $regimen = new Regimen();
        $regimen->regimen = $data['regimen'];
        $regimen->porcentaje = $data['porcentaje'];
        $regimen->es_sala = $data['es_sala'];
        $regimen->save();
        return $regimen;
    }

    public static function listarRegimen(){
        return Regimen::All();
    }

    public static function actualizarRegimen(array $data, String $id){
        DB::table('Regimen')
            ->where('codigo', $id)
            ->update($data);
        return DB::table('Regimen')->where('codigo', $data['codigo'])->first();
    }

    public static function borrarRegimen(String $id){
        return DB::table('Regimen')->where('codigo', $id)->delete();
    }

    public static function mostrarRegimen(String $id){
        return DB::table('Regimen')->where('codigo', $id)->first();
    }
}
