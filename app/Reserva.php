<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = "Reserva";

    public $timestamps = false;

    protected $fillable = ('codigo', 'fecha_inicio', 'fecha_fin', 'descripcion');

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
}
