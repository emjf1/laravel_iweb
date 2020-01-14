<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_reserva extends Model
{
    protected $table = "Tipo_reserva";

    public $timestamps = false;

    protected $fillable = ('codigo', 'tipo');

    public function reservas(){
        return $this->hasMany('App\Reserva');
    }
        public static function crear(array $data){
            $treserva = new Tipo_reserva();
            $treserva->codigo = $data['codigo'];
            $treserva->tipo = $data['tipo'];
            $treserva->save();
            return $treserva;
        }

        public function actualizar(array $data, Tipo_reserva $treserva){
            $treserva->update($data);
            return $treserva;
        }

        public function borrar(array $data, Tipo_reserva $treserva){
            if($treserva->delete($data))
                return true;
            else
                return false;
        }

        public static function leer(Tipo_reserva $data){
            $treserva = Tipo_reserva::where('codigo', '=', $data->codigo);
            return $treserva;
        }
}
