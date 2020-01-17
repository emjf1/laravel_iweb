<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tipo_reserva extends Model
{
    protected $table = "tipo_reserva";

    public $timestamps = false;

    protected $fillable = array('codigo', 'tipo');

    public function reservas(){
        return $this->hasMany('App\Reserva');
    }
        public static function crearTipo_reserva(array $data){
            $treserva = new Tipo_reserva();
            $treserva->tipo = $data['tipo'];
            $treserva->save();
            return $treserva;
        }

    public static function listarTipo_reserva(){
        return Tipo_reserva::All();
    }

    public static function actualizarTipo_reserva(array $data, String $id){
        DB::table('Tipo_reserva')
            ->where('codigo', $id)
            ->update($data);
        return DB::table('Tipo_reserva')->where('codigo', $data['codigo'])->first();
    }

    public static function borrarTipo_reserva(String $id){
        return DB::table('Tipo_reserva')->where('codigo', $id)->delete();
    }

    public static function mostrarTipo_reserva(String $id){
        return DB::table('Tipo_reserva')->where('codigo', $id)->first();
    }
}
