<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_reserva extends Model
{
    protected $table = "Tipo_reserva";

    public $timestamps = false;

    protected $fillable = array('codigo', 'tipo');

    public function reservas(){
        return $this->hasMany('App\Reserva');
    }
        public static function crearTipo_reserva(array $data){
            $treserva = new Tipo_reserva();
            $treserva->codigo = $data['codigo'];
            $treserva->tipo = $data['tipo'];
            $treserva->save();
            return $treserva;
        }

        public function actualizarTipo_reserva(array $data, Tipo_reserva $treserva){
            DB::table('Tipo_reserva')
                ->where('codigo', $treserva->codigo)
                ->update($data);

            $treservaActualizada = DB::table('Tipo_reserva')->where('codigo', $data['codigo'])->first();
            return $treservaActualizada;
        }

        public function borrarTipo_reserva(Tipo_reserva $treserva){
            if(DB::table('Tipo_reserva')->where('codigo', $treserva->codigo)->delete())
                return true;
            else
                return false;
        }

        public static function mostrarTipo_reserva(Tipo_reserva $data){
            $treserva = Tipo_reserva::where('codigo', '=', $data->codigo);
            return $treserva;
        }
}
