<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Sala_conferencia extends Model

{
    protected $table = "Sala_conferencia";

    public $timestamps = false;

    protected $fillable = array('codigo', 'descripcion', 'proyector', 'microfono', 'pizarra', 'mesas', 'asientos', 'puntuacion', 'precio', 'superficie');

    public function reservas(){
        return $this->hasMany('App\Reserva');
    }

    public static function crearSala(array $data){
        $sala = new Sala_conferencia();
        $sala->descripcion = $data['descripcion'];
        $sala->proyector = $data['proyector'];
        $sala->microfono = $data['microfono'];
        $sala->pizarra = $data['pizarra'];
        $sala->mesas = $data['mesas'];
        $sala->asientos = $data['asientos'];
        $sala->puntuacion = $data['puntuacion'];
        $sala->precio = $data['precio'];
        $sala->superficie = $data['superficie'];
        $sala->save();
        return $sala;
    }

    public static function listarSala(){
        return Sala_conferencia::All();
    }

    public static function actualizarSala(array $data, String $id){
        DB::table('Sala_conferencia')
            ->where('codigo', $id)
            ->update($data);
        return DB::table('Sala_conferencia')->where('codigo', $data['codigo'])->first();
    }

    public static function borrarSala(String $id){
        return DB::table('Sala_conferencia')->where('codigo', $id)->delete();
    }

    public static function mostrarSala(String $id){
        return DB::table('Sala_conferencia')->where('codigo', $id)->first();
    }
}
