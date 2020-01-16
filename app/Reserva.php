<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Reserva extends Model
{
    protected $table = "Reserva";

    public $timestamps = false;

    protected $fillable = array('codigo', 'fecha_inicio', 'fecha_fin', 'descripcion');

    public function usuarioReserva(){
        return $this->belongsTo('App\Usuario');
    }

    public function regimenReserva(){
            return $this->belongsTo('App\Regimen');
    }

    public function tipoReservaReserva(){
            return $this->belongsTo('App\Tipo_reserva');
    }

    public function sala_conferenciaReserva(){
            return $this->belongsTo('App\Sala_conferencia');
    }

    public function habitacionReserva(){
            return $this->belongsTo('App\Habitacion');
    }

    public static function listarReservaUsuario(String $usuario){
        return DB::table('Reserva')->where('usuario', $usuario)->get();;
    }

    public static function crearReserva(array $data){
        $reserva = new Reserva();
        $reserva->codigo = $data['codigo'];
        $reserva->fecha_inicio = $data['fecha_inicio'];
        $reserva->fecha_fin = $data['fecha_fin'];
        $reserva->descripcion = $data['descripcion'];
        $reserva->usuario = $data['usuario'];
        $reserva->habitacion = $data['habitacion'];
        $reserva->sala_conferencia   = $data['sala_conferencia'];
        $reserva->regimen = $data['regimen'];
        $reserva->tipo_reserva = $data['tipo_reserva'];
        $reserva->save();
        return $reserva;
    }

    public static function listarReserva(){
        return Reserva::All();
    }

    public static function actualizarReserva(array $data, String $id){
        DB::table('Reserva')
            ->where('codigo', $id)
            ->update($data);
        return DB::table('Reserva')->where('codigo', $data['codigo'])->first();
    }

    public static function borrarReserva(String $id){
        return DB::table('Reserva')->where('codigo', $id)->delete();
    }

    public static function mostrarReserva(String $id){
        return DB::table('Reserva')->where('codigo', $id)->first();
    }
}
