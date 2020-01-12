<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
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
}
