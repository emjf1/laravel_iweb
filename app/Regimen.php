<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regimen extends Model
{
    protected $table = "Regimen";

    public $timestamps = false;

    protected $fillable = ('codigo', 'regimen', 'porcentaje');

    public function reservas(){
        return $this->hasMany('App\Reserva');
    }

    public static function crear(array $data){
        $regimen = new Regimen();
        $regimen->codigo = $data['codigo'];
        $regimen->regimen = $data['regimen'];
        $regimen->porcentaje = $data['porcentaje'];
        $regimen->save();
        return $regimen;
    }

    public function actualizar(array $data, Regimen $regimen){
        $regimen->update($data);
        return $regimen;
    }

    public function borrar(array $data, Regimen $regimen){
        if($regimen->delete($data))
            return true;
        else
            return false;
    }

    public static function leer(Regimen $data){
        $regimen = Regimen::where('codigo', '=', $data->codigo);
        return $regimen;
    }
}
