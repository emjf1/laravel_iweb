<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public static function listarReserva(){
        $reservas = Reserva::All();
        return $reservas;
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

    public function actualizarReserva(array $data, Reserva $reserva){
        DB::table('Reserva')
            ->where('codigo', $reserva->codigo)
            ->update($data);

        $reservaActualizada = DB::table('Reserva')->where('codigo', $data['codigo'])->first();
        return $reservaActualizada;
    }

    public function borrarReserva(Reserva $reserva){
        if(DB::table('Reserva')->where('codigo', $reserva->codigo)->delete())
            return true;
        else
            return false;
    }

    public static function mostrarReserva(Reserva $data){
        $reserva = Reserva::where('codigo', '=', $data->codigo);
        return $reserva;
    }
}
