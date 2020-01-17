<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = "imagen";

    public $timestamps = false;

    protected $fillable = array('codigo', 'url');

    public function habitacion(){
        return $this->hasMany('App\Habitacion');
    }

    public function sala(){
        return $this->hasMany('App\Sala_conferencia');
    }

    public static function listarImagen(){
        return DB::table('imagen')->get();;
    }

    public static function crearImagen(array $data){
        $imagen = new Imagen();
        $imagen->url = $data['url'];
        $imagen->habitacion = $data['habitacion'];
        $imagen->sala_conferencia = $data['sala_conferencia'];
        $imagen->save();
        return $imagen;
    }

    public static function actualizarImagen(array $data, String $id){
        DB::table('Imagen')
            ->where('codigo', $id)
            ->update($data);
        return DB::table('Imagen')->where('codigo', $data['codigo'])->first();
    }

    public static function borrarImagen(String $id){
        return DB::table('Imagen')->where('codigo', $id)->delete();
    }

    public static function mostrarImagen(String $id){
        return DB::table('Imagen')->where('codigo', $id)->first();
    }
}
