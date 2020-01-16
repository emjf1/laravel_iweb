<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tipo_usuario extends Model
{
    protected $table = "Tipo_usuario";

    protected $fillable = array('codigo', 'tipo');

    public $timestamps = false;

    public function users(){
        return $this->hasMany('App\Usuario');
    }

        public static function crearTipo_usuario(array $data){
            $tusuario = new Tipo_usuario();
            $tusuario->codigo = $data['codigo'];
            $tusuario->tipo = $data['tipo'];
            $tusuario->save();
            return $tusuario;
        }

        public static function actualizarTipo_usuario(array $data, String $id){
            DB::table('Tipo_usuario')
                ->where('codigo', $id)
                ->update($data);

            $tuserActualizada = DB::table('Tipo_usuario')->where('codigo', $data['codigo'])->first();
            return $tuserActualizada;
        }

        public static function borrarTipo_usuario(String $id){
            if(DB::table('Tipo_usuario')->where('codigo', $id)->delete())
                return true;
            else
                return false;
        }

        public static function mostrarTipo_usuario(String $id){
            return DB::table('Tipo_usuario')->where('codigo', $id)->first();;
        }

        public static function listarTipo_Usuario(){
            $tusers = Tipo_usuario::all();
            return $tusers;
        }
}
