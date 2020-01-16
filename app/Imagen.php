<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = "Imagen";

    public $timestamps = false;

    protected $fillable = array('codigo', 'url');

    public function habitacion(){
        return $this->hasMany('App\Habitacion');
    }

    public static function listarImagen(){
        return Imagen::All();;
    }

    public static function crearImagen(array $data){
        $imagen = new Imagen();
        $imagen->codigo = $data['codigo'];
        $imagen->url = $data['url'];
        $imagen->habitacion = $data['habitacion'];
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
