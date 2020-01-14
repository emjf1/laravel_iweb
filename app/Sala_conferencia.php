<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala_conferencia extends Model
{
    protected $table = "Sala_conferencia";

    public $timestamps = false;

    protected $fillable = ('codigo', 'descripcion', 'proyector', 'microfono', 'pizarra', 'mesas', 'asientos');

    public function reservas(){
        return $this->hasMany('App\Reserva');
    }

    public static function crear(array $data){
        $sala = new Sala_conferencia();
        $sala->codigo = $data['codigo'];
        $sala->descripcion = $data['descripcion'];
        $sala->proyector = $data['proyector'];
        $sala->microfono = $data['microfono'];
        $sala->pizarra = $data['pizarra'];
        $sala->mesas = $data['mesas'];
        $sala->asientos = $data['asientos'];
        $sala->save();
        return $sala;
    }

    public function actualizar(array $data, Sala_conferencia $sala){
        $sala->update($data);
        return $sala;
    }

    public function borrar(array $data, Sala_conferencia $sala){
        if($sala->delete($data))
            return true;
        else
            return false;
    }

    public static function leer(Sala_conferencia $data){
        $sala = Sala_conferencia::where('codigo', '=', $data->codigo);
        return $sala;
    }
}
