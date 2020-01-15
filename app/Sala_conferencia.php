<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Sala_conferencia extends Model

{
    protected $table = "Sala_conferencia";

    public $timestamps = false;

    protected $fillable = array('codigo', 'descripcion', 'proyector', 'microfono', 'pizarra', 'mesas', 'asientos', 'puntuacion', 'precio');

    public function reservas(){
        return $this->hasMany('App\Reserva');
    }

    public static function listarSalas(){
        $salas = Sala_conferencia::All();
        return $salas;
    }

    public static function crearSala(array $data){
        $sala = new Sala_conferencia();
        $sala->codigo = $data['codigo'];
        $sala->descripcion = $data['descripcion'];
        $sala->proyector = $data['proyector'];
        $sala->microfono = $data['microfono'];
        $sala->pizarra = $data['pizarra'];
        $sala->mesas = $data['mesas'];
        $sala->asientos = $data['asientos'];
        $sala->puntuacion = $data['puntuacion'];
        $sala->precio = $data['precio'];
        $sala->save();
        return $sala;
    }

    public static function actualizarSala(array $data, Sala_conferencia $sala){
        DB::table('Sala_conferencia')->where('codigo', $sala->codigo)->update($data);
        $salaActualizada = DB::table('Sala_conferencia')->where('codigo', $data['codigo'])->first();
        return $salaActualizada;
    }

    public static function borrarSala(Sala_conferencia $sala){
        if(DB::table('Sala_conferencia')->where('codigo', $sala->codigo)->delete())
            return true;
        else
            return false;
    }

    public static function mostrarSala(Sala_conferencia $data){
        $sala = Sala_conferencia::where('codigo', '=', $data->codigo)->first();
        return $sala;
    }
}
